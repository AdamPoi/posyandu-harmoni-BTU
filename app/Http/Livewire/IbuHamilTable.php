<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\IbuHamil;

class IbuHamilTable extends DataTableComponent
{
  protected $model = IbuHamil::class;

  public function configure(): void
  {
    $this->setPrimaryKey('id');
  }
  public function deleteId($id)
  {
  }
  public function columns(): array
  {
    return [
      Column::make("Id ibu hamil", "id_ibu_hamil")
        ->sortable()->searchable(),
      Column::make("Nama", "nama")
        ->sortable()->searchable(),
      Column::make("Alamat", "alamat")
        ->sortable()->searchable(),
      Column::make("Usia kandungan", "usia_kandungan")
        ->sortable()->searchable(),
      Column::make('Actions')
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
}
