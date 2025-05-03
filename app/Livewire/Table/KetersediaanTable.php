<?php

namespace App\Livewire\Table;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Ketersediaan;

class KetersediaanTable extends DataTableComponent
{
    protected $model = Ketersediaan::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Terpesan id", "terpesan_id")
                ->sortable(),
            Column::make("Pemesanan id", "pemesanan_id")
                ->sortable(),
            Column::make("Mobil id", "mobil_id")
                ->sortable(),
            Column::make("Supir id", "supir_id")
                ->sortable(),
            Column::make("Tanggal keberangkatan", "tanggal_keberangkatan")
                ->sortable(),
            Column::make("Status ketersediaan", "status_ketersediaan")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
