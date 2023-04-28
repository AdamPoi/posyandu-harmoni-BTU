<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;

class UserTable extends DataTableComponent
{
  protected $model = User::class;

  public function configure(): void
  {
    $this->setPrimaryKey('id_user');
  }

  public function columns(): array
  {
    return [
      Column::make("Id user", "id_user")
        ->sortable(),
      Column::make("Nama", "nama")
        ->sortable(),
      Column::make("Role", "role")
        ->sortable(),
      Column::make("Email", "email")
        ->sortable(),
        // Column::make('Actions')
        //     ->label(
        //         function ($row, Column $column) {
        //             return view('pages.user.index');
        //         }
        //     ),
        Column::make('Actions')
            ->label(
                function ($row) {
                    $delete =
                        '<a href="#" class="btn btn-icon icon-center btn-danger delete-btn" data-id="' . $row->id_user . '">
                            <i class="fas fa-trash"></i>
                        </a>';
                    $edit =
                        '<a href="' . route('user.edit', ['user' => $row->id_user]) . '" class="btn btn-icon icon-center btn-warning">
                            <i class="fas fa-pencil-alt"></i>
                        </a>';
                    $detail =
                        '<a href="' . route('user.show', ['user' => $row->id_user]) . '" class="btn btn-icon icon-center btn-primary">
                            <i class="fas fa-circle-info"></i>
                        </a>';
                    return $detail . $edit . $delete;
                }
            )->html(),
    ];
  }
}
