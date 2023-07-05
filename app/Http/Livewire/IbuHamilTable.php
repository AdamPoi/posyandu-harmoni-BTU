<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\IbuHamil;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Filters\NumberFilter;
use App\Exports\IbuHamilsExport;

use Excel;
use PDF;

class IbuHamilTable extends DataTableComponent
{
  protected $model = IbuHamil::class;

  public function configure(): void
  {
    $this->setPrimaryKey('id_ibu_hamil');
    $this->setFilterLayout('slide-down');
  }
  public function deleteId($id)
  {
  }
  public function columns(): array
  {
    return [
      Column::make("Id ibu hamil", "id_ibu_hamil")
        ->sortable()->searchable()->deselected(),
      Column::make("Nama", "nama")
        ->sortable()->searchable(),
      Column::make("Alamat", "alamat")
        ->sortable()->searchable(),
      Column::make("Usia kandungan", "usia_kandungan")
        ->sortable()->searchable()->format(fn ($value) => $value . ' bulan'),
      Column::make('Aksi')
        ->label(
          function ($row) {
            $delete = ' <button class="btn btn-danger btn-icon icon-center"
                                data-action="' . route('ibuhamil.destroy', ['ibuhamil' => $row->id_ibu_hamil]) . '" data-toggle="modal"
                                data-target="#confirm-delete-modal"> <i class="fas fa-trash"></i>
                                </button>';
            $edit =
              '<a href="' . route('ibuhamil.edit', ['ibuhamil' => $row->id_ibu_hamil]) . '" class="btn btn-icon icon-center btn-warning">
                                <i class="fas fa-pencil-alt"></i>
                            </a>';
            $detail =
              '<a href="' . route('ibuhamil.show', ['ibuhamil' => $row->id_ibu_hamil]) . '" class="btn btn-icon icon-center btn-primary">
                                <i class="fas fa-circle-info"></i>
                            </a>';
            return '<div class="btn-group" role="group">' .  $detail . $edit . $delete;
          }
        )->html(),

      // Column::make("Tanggal hamil", "tanggal_hamil")
      //   ->sortable(),
      // Column::make("Tanggal lahir", "tanggal_lahir")
      //   ->sortable(),
      // Column::make("Created at", "created_at")
      //   ->sortable(),
      // Column::make("Updated at", "updated_at")
      //   ->sortable(),
    ];
  }
  public function filters(): array
  {
    return [
      NumberFilter::make('Usia Kandungan dari')
        ->config([
          'min' => 0,
          'max' => 20,
        ])
        ->filter(function (Builder $builder, string $value) {
          $builder->where('usia_kandungan', '>=', $value);
        }),
      NumberFilter::make('Sampai Usia Kandungan')
        ->config([
          'min' => 0,
          'max' => 20,
        ])
        ->filter(function (Builder $builder, string $value) {
          $builder->where('usia_kandungan', '<=', $value);
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
    $ibuhamils = IbuHamil::whereIn('id_ibu_hamil', $items)->get();
    $this->clearSelected();
    $pdf = PDF::loadview('pages.ibuhamil.ibuhamil_pdf', ['ibuhamils' => $ibuhamils])->output();

    return response()->streamDownload(
      fn () => print($pdf),
      "data-ibuhamil.pdf"
    );
  }

  public function exportExcel()
  {
    $items = $this->getSelected();
    $this->clearSelected();
    return Excel::download(new IbuHamilsExport($items), 'ibuhamils.xlsx');
  }
}
