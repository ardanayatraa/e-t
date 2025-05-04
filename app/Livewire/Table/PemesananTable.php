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
        $this->setPrimaryKey('pemesanan_id');
    }

    public function columns(): array
    {
        return [
            Column::make("pemesanan id", "pemesanan_id")
                ->sortable(),

            Column::make("Pemesan id", "pemesan_id")
                ->sortable(),

            Column::make("Paketwisata id", "paketwisata_id")
                ->sortable(),

            Column::make("Tipemobil id", "mobil_id")
                ->sortable(),

            Column::make("Jam mulai", "jam_mulai")
                ->sortable(),

            Column::make("Tanggal keberangkatan", "tanggal_keberangkatan")
                ->sortable(),

            Column::make('Actions')
                ->label(fn($row) => view('components.table-action', [
                    'rowId'     => $row->pemesanan_id,
                    'editUrl'   => route('pemesanan.edit', $row->pemesanan_id),
                    'deleteUrl' => route('pemesanan.destroy', $row->pemesanan_id),
                ])->render())
                ->html(),
        ];
    }
}
