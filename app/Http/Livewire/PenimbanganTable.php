<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Penimbangan;

class PenimbanganTable extends DataTableComponent
{
  protected $model = Penimbangan::class;

  public function configure(): void
  {
    $this->setPrimaryKey('id_penimbangan');
  }

  public function columns(): array
  {
    return [
      Column::make("Id", "id_penimbangan")
        ->sortable(),
      Column::make("Id balita", "id_balita")
        ->sortable(),
      Column::make("Berat badan", "berat_badan")
        ->sortable(),
      Column::make("Tinggi badan", "tinggi_badan")
        ->sortable(),
      Column::make("Tanggal", "tanggal")
        ->sortable(),
      Column::make("Created at", "created_at")
        ->sortable(),
      Column::make("Updated at", "updated_at")
        ->sortable(),
    ];
  }
}
