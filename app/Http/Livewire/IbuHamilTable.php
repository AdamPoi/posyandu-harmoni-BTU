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
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id ibu hamil", "id_ibu_hamil")
                ->sortable(),
            Column::make("Nama", "nama")
                ->sortable(),
            Column::make("Alamat", "alamat")
                ->sortable(),
            Column::make("No telepon", "no_telepon")
                ->sortable(),
            Column::make("Usia kandungan", "usia_kandungan")
                ->sortable(),
            Column::make("Tanggal hamil", "tanggal_hamil")
                ->sortable(),
            Column::make("Tanggal lahir", "tanggal_lahir")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
