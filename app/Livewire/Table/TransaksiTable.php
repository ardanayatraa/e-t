<?php

namespace App\Livewire\Table;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Transaksi;

class TransaksiTable extends DataTableComponent
{
    protected $model = Transaksi::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Transaksi id", "transaksi_id")
                ->sortable(),
            Column::make("Peketwisata id", "peketwisata_id")
                ->sortable(),
            Column::make("Pemesan id", "pemesan_id")
                ->sortable(),
            Column::make("Pemesanan id", "pemesanan_id")
                ->sortable(),
            Column::make("Jenis transakasi", "jenis_transakasi")
                ->sortable(),
            Column::make("Jumlah peserta", "jumlah_peserta")
                ->sortable(),
            Column::make("Owe to me", "owe_to_me")
                ->sortable(),
            Column::make("Pay to provider", "pay_to_provider")
                ->sortable(),
            Column::make("Total transaksai", "total_transaksai")
                ->sortable(),
            Column::make("Transaksi status", "transaksi_status")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
