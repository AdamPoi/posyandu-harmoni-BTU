<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Vitamin;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use App\Exports\VitaminsExport;

use Excel;
use PDF;

class VitaminTable extends DataTableComponent
{
  protected $model = Vitamin::class;

  public function configure(): void
  {
    $this->setPrimaryKey('id_vitamin');
  }

  public function columns(): array
  {
    return [
      Column::make("Id vitamin", "id_vitamin")
        ->sortable()->searchable()->deselected(),
      Column::make("Jenis vitamin", "jenis_vitamin")
        ->sortable()->searchable(),
      Column::make("Deskripsi Vitamin", "deskripsi")
        ->sortable()->searchable(),
      Column::make('Aksi')
        ->label(
          function ($row) {
            $delete = ' <button class="btn btn-danger btn-icon icon-center"
                                data-action="' . route('vitamin.destroy', ['vitamin' => $row->id_vitamin]) . '" data-toggle="modal"
                                data-target="#confirm-delete-modal"> <i class="fas fa-trash"></i>
                                </button>';
            $edit =
              '<a href="' . route('vitamin.edit', ['vitamin' => $row->id_vitamin]) . '" class="btn btn-icon icon-center btn-warning">
                            <i class="fas fa-pencil-alt"></i>
                        </a>';
            $detail =
              '<a href="' . route('vitamin.show', ['vitamin' => $row->id_vitamin]) . '" class="btn btn-icon icon-center btn-primary">
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
    $vitamins = Vitamin::whereIn('id_vitamin', $items)->get();
    $this->clearSelected();
    $pdf = PDF::loadview('pages.vitamin.vitamin_pdf', ['vitamins' => $vitamins])->output();

    return response()->streamDownload(
      fn () => print($pdf),
      "data-vitamin.pdf"
    );
  }

  public function exportExcel()
  {
    $items = $this->getSelected();
    $this->clearSelected();
    return Excel::download(new VitaminsExport($items), 'vitamins.xlsx');
  }
}
