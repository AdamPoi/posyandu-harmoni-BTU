<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Pemeriksaan;

class PemeriksaanTable extends DataTableComponent
{
    protected $model = Pemeriksaan::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id_pemeriksaan');
    }

    public function columns(): array
    {
        return [
            Column::make("Id pemeriksaan", "id_pemeriksaan")
                ->sortable(),
            Column::make("Id ibu hamil", "id_ibu_hamil")
                ->sortable(),
            Column::make("Tanggal", "tanggal")
                ->sortable(),
            Column::make("Catatan", "catatan")
                ->sortable(),
            // Column::make("Created at", "created_at")
            //     ->sortable(),
            // Column::make("Updated at", "updated_at")
            //     ->sortable(),
            Column::make('Actions')
                ->label(
                    function ($row) {
                        $delete =
                            '<a href="' . route('pemeriksaan.destroy', ['pemeriksaan' => $row->id_pemeriksaan]) . '" class="btn btn-icon icon-center btn-danger delete-btn">
                                <i class="fas fa-trash"></i>
                            </a>';
                            // '<a href="" class="btn btn-icon icon-center btn-danger delete-btn" data-id="' . $row->id_pemeriksaan . '">
                            //     <i class="fas fa-trash"></i>
                            // </a>';
                        $edit =
                            '<a href="' . route('pemeriksaan.edit', ['pemeriksaan' => $row->id_pemeriksaan]) . '" class="btn btn-icon icon-center btn-warning">
                                <i class="fas fa-pencil-alt"></i>
                            </a>';
                        $detail =
                            '<a href="' . route('pemeriksaan.show', ['pemeriksaan' => $row->id_pemeriksaan]) . '" class="btn btn-icon icon-center btn-primary">
                                <i class="fas fa-circle-info"></i>
                            </a>';
                        return '<div class="btn-group" role="group">' .  $detail . $edit . $delete;
                    }
                )->html(),
        ];
    }
}
