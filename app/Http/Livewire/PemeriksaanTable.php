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
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
