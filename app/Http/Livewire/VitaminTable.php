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
        ->sortable(),
      Column::make("Jenis vitamin", "jenis_vitamin")
        ->sortable(),
        Column::make('Actions')
            ->label(
                function ($row) {
                    $delete =
                        '<a href="#" class="btn btn-icon icon-center btn-danger delete-btn" data-id="' . $row->id_vitamin . '">
                            <i class="fas fa-trash"></i>
                        </a>';
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
