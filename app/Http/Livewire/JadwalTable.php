<?php

namespace App\Http\Livewire;

use App\Exports\JadwalsExport;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Jadwal;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use Excel;
use PDF;

class JadwalTable extends DataTableComponent
{
  protected $model = Jadwal::class;


  public function configure(): void
  {
    $this->setPrimaryKey('id_jadwal');
    $this->setFilterLayout('slide-down');
  }

  public function columns(): array
  {
    return [
      Column::make("Id jadwal", "id_jadwal")
        ->sortable()->deselected(),
      Column::make("Tanggal", "tanggal")
        ->sortable()->searchable(),
      Column::make("Kegiatan", "kegiatan")
        ->sortable()->searchable(),
      Column::make("Deskripsi", "deskripsi")
        ->sortable(),

      Column::make('Actions')
        ->label(
          function ($row) {
            $delete = ' <button class="btn btn-danger btn-icon icon-center"
                                data-action="' . route('jadwal.destroy', ['jadwal' => $row->id_jadwal]) . '" data-toggle="modal"
                                data-target="#confirm-delete-modal"> <i class="fas fa-trash"></i>
                                </button>';
            $edit =
              '<a href="' . route('jadwal.edit', ['jadwal' => $row->id_jadwal]) . '" class="btn btn-icon icon-center btn-warning">
                                <i class="fas fa-pencil-alt"></i>
                            </a>';
            $detail =
              '<a href="' . route('jadwal.show', ['jadwal' => $row->id_jadwal]) . '" class="btn btn-icon icon-center btn-primary">
                                <i class="fas fa-circle-info"></i>
                            </a>';
            return '<div class="btn-group" role="group">' .  $detail . $edit . $delete;
          }
        )->html(),


      // Column::make("Created at", "created_at")
      //     ->sortable(),
      // Column::make("Updated at", "updated_at")
      //     ->sortable(),
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
    $jadwals = Jadwal::whereIn('id_jadwal', $items)->get();
    $this->clearSelected();
    $pdf = PDF::loadview('pages.jadwal.jadwal_pdf', ['jadwals' => $jadwals])->output();

    return response()->streamDownload(
      fn () => print($pdf),
      "data-jadwal.pdf"
    );
  }

  public function exportExcel()
  {
    $items = $this->getSelected();
    $this->clearSelected();
    return Excel::download(new JadwalsExport($items), 'jadwals.xlsx');
  }
}
