<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Balita;

class BalitaTable extends DataTableComponent
{
    protected $model = Balita::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id balita", "id_balita")
                ->sortable(),
            Column::make("Id ibu hamil", "id_ibu_hamil")
                ->sortable(),
            Column::make("Nama", "nama")
                ->sortable(),
            Column::make("Nama ayah", "nama_ayah")
                ->sortable(),
            Column::make("Nama ibu", "nama_ibu")
                ->sortable(),
            Column::make("Tanggal lahir", "tanggal_lahir")
                ->sortable(),
            Column::make("Jenis kelamin", "jenis_kelamin")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
