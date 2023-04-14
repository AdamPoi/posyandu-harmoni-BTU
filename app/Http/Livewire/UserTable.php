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
      Column::make("Umur", "umur")
        ->sortable(),
      Column::make("Role", "role")
        ->sortable(),
      Column::make("Alamat", "alamat")
        ->sortable(),
      Column::make("Email", "email")
        ->sortable(),
      Column::make("Created at", "created_at")
        ->sortable(),
      Column::make("Updated at", "updated_at")
        ->sortable(),
    ];
  }
}
