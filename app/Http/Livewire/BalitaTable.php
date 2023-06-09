<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Balita;

class BalitaTable extends DataTableComponent
{
  protected $model = Balita::class;

  public function configure(): void
  {
    $this->setPrimaryKey('id');
  }

  public function columns(): array
  {
    return [
      Column::make("Id balita", "id_balita")
        ->sortable(),
      // Column::make("Id ibu hamil", "id_ibu_hamil")
      //     ->sortable(),
      Column::make("Nama", "nama")
        ->sortable()->searchable(),
      Column::make("Nama ayah", "nama_ayah")
        ->sortable(),
      Column::make("Nama ibu", "nama_ibu")
        ->sortable(),
      Column::make("Tanggal lahir", "tanggal_lahir")
        ->sortable(),
      Column::make("Jenis kelamin", "jenis_kelamin")
        ->sortable(),
      // Column::make("Created at", "created_at")
      //     ->sortable(),
      // Column::make("Updated at", "updated_at")
      //     ->sortable(),

      Column::make('Actions')
        ->label(function ($row) {
          $delete = ' <button class="btn btn-danger btn-icon icon-center"
                                data-action="' . route('balita.destroy', ['balita' => $row->id_balita]) . '" data-toggle="modal"
                                data-target="#confirm-delete-modal"> <i class="fas fa-trash"></i>
                                </button>';
          $edit = '<a href="' . route('balita.edit', ['balita' => $row->id_balita]) . '" class="btn btn-icon icon-center btn-warning">
                                <i class="fas fa-pencil-alt"></i>
                            </a>';
          $detail = '<a href="' . route('balita.show', ['balita' => $row->id_balita]) . '" class="btn btn-icon icon-center btn-primary">
                                <i class="fas fa-circle-info"></i>
                            </a>';
          return '<div class="btn-group" role="group">' . $detail . $edit . $delete . '</div>';
        })->html()
    ];
  }
}
