<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Penimbangan;

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
        ->sortable(),
      Column::make("Balita", "balita.nama")
        ->sortable(),
      Column::make("Berat badan", "berat_badan")
        ->sortable(),
      Column::make("Tinggi badan", "tinggi_badan")
        ->sortable(),
      Column::make("Tanggal", "tanggal")
        ->sortable(),
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
}
