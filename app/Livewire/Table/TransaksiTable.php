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
        $this->setPrimaryKey('transaksi_id');
    }

    public function columns(): array
    {
        return [
            Column::make("Transaksi id", "transaksi_id")
                ->sortable(),

            Column::make("Paketwisata id", "paketwisata_id")
                ->sortable(),

            Column::make("Pemesan id", "pemesan_id")
                ->sortable(),

            Column::make("Pemesanan id", "pemesanan_id")
                ->sortable(),

            Column::make("Jenis transaksi", "jenis_transaksi")
                ->sortable(),

            Column::make("Jumlah peserta", "jumlah_peserta")
                ->sortable(),

            Column::make("Owe to me", "owe_to_me")
                ->sortable(),

            Column::make("Pay to provider", "pay_to_provider")
                ->sortable(),

            Column::make("Total transaksi", "total_transaksi")
                ->sortable(),

            Column::make("Transaksi status", "transaksi_status")
                ->sortable(),


            Column::make('Actions')
                ->label(fn($row) => view('components.transaksi-action', [
                    'rowId'     => $row->transaksi_id,
                    'confirmUrl'   => route('transaksi.confirm', $row->transaksi_id),
                    'status'=>$row->transaksi_status
                ])->render())
                ->html(),
        ];
    }
}
