<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Vitamin;

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
        ->sortable()->searchable(),
      Column::make("Jenis vitamin", "jenis_vitamin")
        ->sortable()->searchable(),
        Column::make("Deskripsi Vitamin", "deskripsi")
        ->sortable()->searchable(),
      Column::make('Actions')
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
}
