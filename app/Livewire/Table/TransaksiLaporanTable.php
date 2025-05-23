<?php

namespace App\Livewire\Table;

use App\Exports\TransaksiExport;
use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Facades\Excel;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter as FiltersDateFilter;

class TransaksiLaporanTable extends DataTableComponent
{
    protected $model = Transaksi::class;

    public function configure(): void
    {
        $this->setPrimaryKey('transaksi_id');
    }

    public function builder(): Builder
    {
        return Transaksi::query()
            ->where('transaksi_status', 'paid');
    }

    public function columns(): array
    {
        return [

            Column::make("Transaksi id",    "transaksi_id")->sortable(),
            Column::make("Paketwisata id",  "paketwisata_id")->sortable(),
            Column::make("Pemesan id",      "pemesan_id")->sortable(),
            Column::make("Pemesanan id",    "pemesanan_id")->sortable(),
            Column::make("Jenis transaksi", "jenis_transaksi")->sortable(),

            Column::make("Deposit", "deposit")
                ->sortable()
                ->format(fn($v) => number_format($v, 0, ',', '.'))
                ->footer(fn($rows) => 'Total: Rp ' . number_format($rows->sum('deposit'), 0, ',', '.')),

            Column::make("Balance", "balance")
                ->sortable()
                ->format(fn($v) => number_format($v, 0, ',', '.'))
                ->footer(fn($rows) => 'Total: Rp ' . number_format($rows->sum('balance'), 0, ',', '.')),

            Column::make("Jumlah peserta", "jumlah_peserta")->sortable(),

            Column::make("Owe to me", "owe_to_me")
                ->sortable()
                ->format(fn($v) => number_format($v, 0, ',', '.')),

            Column::make("Pay to provider", "pay_to_provider")
                ->sortable()
                ->format(fn($v) => number_format($v, 0, ',', '.')),

            Column::make("Total transaksi", "total_transaksi")
                ->sortable()
                ->format(fn($v) => number_format($v, 0, ',', '.'))
                ->footer(fn($rows) => 'Total: Rp ' . number_format($rows->sum('total_transaksi'), 0, ',', '.')),

            Column::make("Status", "transaksi_status")->sortable(),

            Column::make("Dibuat pada", "created_at")
                ->sortable()
                ->format(fn($v) => \Carbon\Carbon::parse($v)->format('Y-m-d H:i:s')),

        ];
    }

    public function filters(): array
    {
        return [
            FiltersDateFilter::make('Dari')
                ->filter(function(Builder $query, string $value) {
                    $query->whereDate('created_at', '>=', $value);
                }),
            FiltersDateFilter::make('Sampai')
                ->filter(function(Builder $query, string $value) {
                    $query->whereDate('created_at', '<=', $value);
                }),
        ];
    }

    public function bulkActions(): array
    {
        return [
            'export' => 'Export',
        ];
    }

    public function export()
    {
        $selectedIds = $this->getSelected();

        return Excel::download(
            new TransaksiExport($selectedIds),
            'laporan_transaksi_'.now()->format('Ymd_His').'.xlsx'
        );

        $this->clearSelected();
    }
}
