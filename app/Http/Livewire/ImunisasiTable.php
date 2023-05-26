<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Imunisasi;

class ImunisasiTable extends DataTableComponent
{
  protected $model = Imunisasi::class;

  public function configure(): void
  {
    $this->setPrimaryKey('id_imunisasi');
  }

  public function columns(): array
  {
    return [
      Column::make("Id", "id_imunisasi")
        ->sortable(),
      Column::make("Id balita", "id_balita")
        ->sortable(),
      Column::make("Jenis imunisasi", "jenis_imunisasi")
        ->sortable(),
      Column::make("Tanggal", "tanggal")
        ->sortable(),
      Column::make("Deskripsi", "deskripsi")
        ->sortable(),
      // Column::make("Created at", "created_at")
      //     ->sortable(),
      // Column::make("Updated at", "updated_at")
      //     ->sortable(),
      Column::make('Actions')
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
}
