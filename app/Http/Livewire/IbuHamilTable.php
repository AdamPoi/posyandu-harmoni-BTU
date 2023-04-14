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
    $this->setPrimaryKey('id_ibu_hamil');
    $this->setPaginationEnabled();
    $this->setSortingEnabled();
    $this->setSearchStatus(true);
  }

  public function columns(): array
  {
    return [
      Column::make("Id ibu hamil", "id_ibu_hamil")
        ->sortable()->searchable(),
      Column::make("Nama", "nama")
        ->sortable()->searchable(),

    ];
  }
}
