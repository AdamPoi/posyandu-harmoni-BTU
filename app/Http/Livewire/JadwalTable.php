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
      Column::make('Actions')
        ->label(
          function ($row) {
            $delete = ' <button class="btn btn-danger btn-icon icon-center"
                                data-action="' . route('jadwal.destroy', ['jadwal' => $row->id_jadwal]) . '" data-toggle="modal"
                                data-target="#confirm-delete-modal"> <i class="fas fa-trash"></i>
                                </button>';
            $edit =
              '<a href="' . route('jadwal.edit', ['jadwal' => $row->id_jadwal]) . '" class="btn btn-icon icon-center btn-warning">
                                <i class="fas fa-pencil-alt"></i>
                            </a>';
            $detail =
              '<a href="' . route('jadwal.show', ['jadwal' => $row->id_jadwal]) . '" class="btn btn-icon icon-center btn-primary">
                                <i class="fas fa-circle-info"></i>
                            </a>';
            return '<div class="btn-group" role="group">' .  $detail . $edit . $delete;
          }
        )->html(),

      // Column::make("Deskripsi", "deskripsi")
      //   ->sortable(),
      // Column::make("Created at", "created_at")
      //     ->sortable(),
      // Column::make("Updated at", "updated_at")
      //     ->sortable(),
    ];
  }
}
