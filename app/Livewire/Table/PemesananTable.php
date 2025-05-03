<?php

namespace App\Livewire\Table;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Pemesanan;

class PemesananTable extends DataTableComponent
{
    protected $model = Pemesanan::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Pamesanan id", "pamesanan_id")
                ->sortable(),
            Column::make("Pemesan id", "pemesan_id")
                ->sortable(),
            Column::make("Paketwisata id", "paketwisata_id")
                ->sortable(),
            Column::make("Tipemobil id", "tipemobil_id")
                ->sortable(),
            Column::make("Jam mulai", "jam_mulai")
                ->sortable(),
            Column::make("Tanggal keberangkatan", "tanggal_keberangkatan")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
