<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Pemeriksaan;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use App\Exports\PemeriksaansExport;

use Excel;
use PDF;

class PemeriksaanTable extends DataTableComponent
{
  protected $model = Pemeriksaan::class;

  public function configure(): void
  {
    $this->setPrimaryKey('id_pemeriksaan');
  }

  public function columns(): array
  {
    return [
      Column::make("Id Pemeriksaan", "id_pemeriksaan")
        ->sortable()->searchable(),
      Column::make("Ibu Hamil", "ibu_hamil.nama")
        ->sortable()->searchable(),
      Column::make("Tanggal Pemeriksaan", "tanggal")
        ->sortable()->searchable(),
      Column::make("Catatan", "catatan")
        ->sortable()->searchable(),
      // Column::make("Created at", "created_at")
      //     ->sortable(),
      // Column::make("Updated at", "updated_at")
      //     ->sortable(),
      Column::make('Actions')
        ->label(
          function ($row) {
            $delete =
              ' <button class="btn btn-danger btn-icon icon-center"
                                data-action="' . route('pemeriksaan.destroy', ['pemeriksaan' => $row->id_pemeriksaan]) . '" data-toggle="modal"
                                data-target="#confirm-delete-modal"> <i class="fas fa-trash"></i>
                                </button>';

            $edit =
              '<a href="' . route('pemeriksaan.edit', ['pemeriksaan' => $row->id_pemeriksaan]) . '" class="btn btn-icon icon-center btn-warning">
                                <i class="fas fa-pencil-alt"></i>
                            </a>';
            $detail =
              '<a href="' . route('pemeriksaan.show', ['pemeriksaan' => $row->id_pemeriksaan]) . '" class="btn btn-icon icon-center btn-primary">
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
    $pemeriksaans = Pemeriksaan::whereIn('id_pemeriksaan', $items)->get();
    $this->clearSelected();
    $pdf = PDF::loadview('pages.pemeriksaan.pemeriksaan_pdf', ['pemeriksaans' => $pemeriksaans])->output();

    return response()->streamDownload(
      fn () => print($pdf),
      "data-pemeriksaan.pdf"
    );
  }

  public function exportExcel()
  {
    $items = $this->getSelected();
    $this->clearSelected();
    return Excel::download(new PemeriksaansExport($items), 'pemeriksaans.xlsx');
  }
}
