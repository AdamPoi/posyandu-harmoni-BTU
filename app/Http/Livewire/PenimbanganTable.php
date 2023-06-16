<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Penimbangan;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use App\Exports\PenimbangansExport;

use Excel;
use PDF;

class PenimbanganTable extends DataTableComponent
{
  protected $model = Penimbangan::class;

  public function configure(): void
  {
    $this->setPrimaryKey('id_penimbangan');
  }

  public function columns(): array
  {
    return [
      Column::make("Id", "id_penimbangan")
        ->sortable()->searchable(),
      Column::make("Balita", "balita.nama")
        ->sortable()->searchable(),
      Column::make("Usia", "balita.usia")
        ->sortable()->searchable(),
      Column::make("Berat badan", "berat_badan")
        ->sortable()->searchable(),
      Column::make("Tinggi badan", "tinggi_badan")
        ->sortable()->searchable(),
      Column::make("Lingkar Kepala", "lingkar_kepala")
        ->sortable()->searchable(),
      Column::make("Tanggal", "tanggal")
        ->sortable()->searchable(),
      // Column::make("Created at", "created_at")
      //   ->sortable(),
      // Column::make("Updated at", "updated_at")
      //   ->sortable(),
      Column::make('Actions')
        ->label(
          function ($row) {
            $delete =
              ' <button class="btn btn-danger btn-icon icon-center"
                                data-action="' . route('penimbangan.destroy', ['penimbangan' => $row->id_penimbangan]) . '" data-toggle="modal"
                                data-target="#confirm-delete-modal"> <i class="fas fa-trash"></i>
                                </button>';
            $edit =
              '<a href="' . route('penimbangan.edit', ['penimbangan' => $row->id_penimbangan]) . '" class="btn btn-icon icon-center btn-warning">
                                <i class="fas fa-pencil-alt"></i>
                            </a>';
            $detail =
              '<a href="' . route('penimbangan.show', ['penimbangan' => $row->id_penimbangan]) . '" class="btn btn-icon icon-center btn-primary">
                                <i class="fas fa-circle-info"></i>
                            </a>';
            return $detail . $edit . $delete;
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
    $penimbangans = Penimbangan::whereIn('id_penimbangan', $items)->get();
    $this->clearSelected();
    $pdf = PDF::loadview('pages.penimbangan.penimbangan_pdf', ['penimbangans' => $penimbangans])->output();

    return response()->streamDownload(
      fn () => print($pdf),
      "data-penimbangan.pdf"
    );
  }

  public function exportExcel()
  {
    $items = $this->getSelected();
    $this->clearSelected();
    return Excel::download(new PenimbangansExport($items), 'penimbangans.xlsx');
  }
}
