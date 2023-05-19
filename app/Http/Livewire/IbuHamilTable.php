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
        ->sortable(),
      Column::make("Nama", "nama")
        ->sortable()->searchable(),
      Column::make("Alamat", "alamat")
        ->sortable()->searchable(),
      Column::make("Usia kandungan", "usia_kandungan")
        ->sortable(),
      Column::make('Actions')
        ->label(
          function ($row) {
            $delete = ' <button type="button" wire:click="deleteId(' . $row->id_ibu_hamil . ')" class="btn btn-icon icon-center btn-danger delete-btn" data-toggle="modal" data-target="#exampleModal"> <i class="fas fa-trash"></i></button>';


            // '<a href="' . route('ibuhamil.destroy', ['ibuhamil' => $row->id_ibu_hamil]) . ' wire:click="deleteId('$row->id_ibu_hamil' )" class="btn btn-icon icon-center btn-danger delete-btn">
            //                   <i class="fas fa-trash"></i>
            //               </a>';
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
