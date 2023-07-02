<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Imunisasi;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use App\Exports\ImunisasisExport;

use Excel;
use PDF;

class ImunisasiTable extends DataTableComponent
{
  protected $model = Imunisasi::class;

  public function configure(): void
  {
    $this->setPrimaryKey('id_imunisasi');
    $this->setFilterLayout('slide-down');
  }

  public function columns(): array
  {
    return [
      Column::make("Id", "id_imunisasi")
        ->sortable()->searchable()->deselected(),
      Column::make("Balita", "balita.nama")
        ->sortable()->searchable(),
      Column::make("Usia", "balita.usia")
        ->sortable()->searchable()->format(
          fn ($value) => $value . ' bulan'
        ),
      Column::make("Jenis Imunisasi", "vitamin.jenis_vitamin")
        ->sortable()->searchable(),
      Column::make("Tanggal", "tanggal")
        ->sortable()->searchable(),
      Column::make("Deskripsi", "deskripsi")
        ->sortable()->searchable(),
      // Column::make("Created at", "created_at")
      //     ->sortable(),
      // Column::make("Updated at", "updated_at")
      //     ->sortable(),
      Column::make('Aksi')
        ->label(
          function ($row) {
            $delete =
              ' <button class="btn btn-danger btn-icon icon-center"
                                data-action="' . route('imunisasi.destroy', ['imunisasi' => $row->id_imunisasi]) . '" data-toggle="modal"
                                data-target="#confirm-delete-modal"> <i class="fas fa-trash"></i>
                                </button>';
            $edit =
              '<a href="' . route('imunisasi.edit', ['imunisasi' => $row->id_imunisasi]) . '" class="btn btn-icon icon-center btn-warning">
                            <i class="fas fa-pencil-alt"></i>
                        </a>';
            $detail =
              '<a href="' . route('imunisasi.show', ['imunisasi' => $row->id_imunisasi]) . '" class="btn btn-icon icon-center btn-primary">
                            <i class="fas fa-circle-info"></i>
                        </a>';
            return '<div class="btn-group" role="group">' .  $detail . $edit . $delete;
          }
        )->html(),
    ];
  }
  public function filters(): array
  {
    return [
      DateFilter::make('Dari Tanggal')
        ->filter(function (Builder $builder, string $value) {
          $builder->where('tanggal', '>=', $value);
        }),
      DateFilter::make('Sampai Tanggal')
        ->filter(function (Builder $builder, string $value) {
          $builder->where('tanggal', '<=', $value);
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
    $imunisasis = Imunisasi::whereIn('id_imunisasi', $items)->get();
    $this->clearSelected();
    $pdf = PDF::loadview('pages.imunisasi.imunisasi_pdf', ['imunisasis' => $imunisasis])->output();

    return response()->streamDownload(
      fn () => print($pdf),
      "data-imunisasi.pdf"
    );
  }

  public function exportExcel()
  {
    $items = $this->getSelected();
    $this->clearSelected();
    return Excel::download(new ImunisasisExport($items), 'imunisasis.xlsx');
  }
}
