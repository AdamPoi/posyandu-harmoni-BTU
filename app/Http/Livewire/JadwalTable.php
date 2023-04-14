<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Jadwal;

class JadwalTable extends DataTableComponent
{
  protected $model = Jadwal::class;


  public function configure(): void
  {
    $this->setPrimaryKey('id_jadwal');
    $this->setDebugStatus(true);
  }

  public function columns(): array
  {
    return [
      Column::make("Id jadwal", "id_jadwal")
        ->sortable(),
      Column::make("Tanggal", "tanggal")
        ->sortable(),
      Column::make("Kegiatan", "kegiatan")
        ->sortable(),
      Column::make("Deskripsi", "deskripsi")
        ->sortable(),
      Column::make("Created at", "created_at")
        ->sortable(),
      Column::make("Updated at", "updated_at")
        ->sortable(),
    ];
  }
}
