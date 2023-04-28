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
      Column::make("Deskripsi", "deskripsi")
        ->sortable(),
    ];
  }
}
