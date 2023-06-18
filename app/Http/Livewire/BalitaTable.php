<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Balita;
use App\Exports\BalitasExport;
use Rappasoft\LaravelLivewireTables\Views\Filters\NumberFilter;
use Illuminate\Database\Eloquent\Builder;

use Excel;
use PDF;

class BalitaTable extends DataTableComponent
{
  protected $model = Balita::class;

  public function configure(): void
  {
    $this->setPrimaryKey('id_balita');
    $this->setFilterLayout('slide-down');
  }

  public function columns(): array
  {
    return [
      Column::make("Id balita", "id_balita")
        ->sortable()->searchable()->deselected(),
      // Column::make("Id ibu hamil", "id_ibu_hamil")
      //     ->sortable(),
      Column::make("Nama", "nama")
        ->sortable()->searchable(),
      Column::make("Nama ayah", "nama_ayah")
        ->sortable()->searchable(),
      // Column::make("Nama ibu", "nama_ibu")
      //   ->sortable(),
      Column::make("Ibu Hamil", "ibu_hamil.nama")
        ->sortable()->searchable(),
      Column::make("Usia", "usia")
        ->sortable()->searchable()->format(fn ($value) => $value . ' bulan'),
      Column::make("Jenis kelamin", "jenis_kelamin")
        ->sortable()->searchable(),

      // Column::make("Created at", "created_at")
      //     ->sortable(),
      // Column::make("Updated at", "updated_at")
      //     ->sortable(),

      Column::make('Aksi')
        ->label(function ($row) {
          $delete = ' <button class="btn btn-danger btn-icon icon-center"
                                data-action="' . route('balita.destroy', ['balita' => $row->id_balita]) . '" data-toggle="modal"
                                data-target="#confirm-delete-modal"> <i class="fas fa-trash"></i>
                                </button>';
          $edit = '<a href="' . route('balita.edit', ['balita' => $row->id_balita]) . '" class="btn btn-icon icon-center btn-warning">
                                <i class="fas fa-pencil-alt"></i>
                            </a>';
          $detail = '<a href="' . route('balita.show', ['balita' => $row->id_balita]) . '" class="btn btn-icon icon-center btn-primary">
                                <i class="fas fa-circle-info"></i>
                            </a>';
          return '<div class="btn-group" role="group">' . $detail . $edit . $delete . '</div>';
        })->html()
    ];
  }
  public function filters(): array
  {
    return [
      NumberFilter::make('Dari Usia')
        ->config([
          'min' => 0,

        ])
        ->filter(function (Builder $builder, string $value) {
          $builder->where('usia', '>=', $value);
        }),
      NumberFilter::make('Sampai Usia')
        ->config([
          'min' => 0,
        ])
        ->filter(function (Builder $builder, string $value) {
          $builder->where('usia', '<=', $value);
        }),
    ];
  }
  public function bulkActions(): array
  {
    return [
      'exportPdf' => 'Export PDF',
      'exportExcel' => 'Export Excel',

    ];
  }

  public function exportPdf()
  {
    $items = $this->getSelected();
    $balitas = Balita::whereIn('id_balita', $items)->get();
    $this->clearSelected();
    $pdf = PDF::loadview('pages.balita.balita_pdf', ['balitas' => $balitas])->output();

    return response()->streamDownload(
      fn () => print($pdf),
      "data-balita.pdf"
    );
  }

  public function exportExcel()
  {
    $items = $this->getSelected();
    $this->clearSelected();
    return Excel::download(new BalitasExport($items), 'balitas.xlsx');
  }
}
