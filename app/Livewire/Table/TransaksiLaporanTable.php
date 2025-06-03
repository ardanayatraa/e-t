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
        return Transaksi::with(['paketWisata', 'pelanggan', 'pemesanan.mobil'])
            ->where('transaksi_status', 'paid');
    }

    public function columns(): array
    {
        return [
            Column::make("Transaksi ID", "transaksi_id")->sortable(),

            Column::make("Paket Wisata", "paketwisata_id")
                ->sortable()
                ->format(fn($v, $row) => optional($row->paketWisata)->judul ?? '-'),

            Column::make("Pemesan", "pemesan_id")
                ->sortable()
                ->format(fn($v, $row) => optional($row->pelanggan)->nama_pemesan ?? '-'),

            Column::make("Mobil", "pemesanan_id")
                ->sortable()
                ->format(fn($v, $row) => optional($row->pemesanan->mobil)->nama_kendaraan ?? '-'),

            Column::make("Jenis Transaksi", "jenis_transaksi")->sortable(),

            Column::make("Deposit", "deposit")
                ->sortable()
                ->format(fn($v) => number_format($v, 0, ',', '.'))
                ->footer(fn($rows) => 'Total: Rp ' . number_format($rows->sum('deposit'), 0, ',', '.')),

            Column::make("Balance", "balance")
                ->sortable()
                ->format(fn($v) => number_format($v, 0, ',', '.'))
                ->footer(fn($rows) => 'Total: Rp ' . number_format($rows->sum('balance'), 0, ',', '.')),

            Column::make("Jumlah Peserta", "jumlah_peserta")->sortable(),

            Column::make("Owe to Me", "owe_to_me")
                ->sortable()
                ->format(fn($v) => number_format($v, 0, ',', '.')),

            Column::make("Pay to Provider", "pay_to_provider")
                ->sortable()
                ->format(fn($v) => number_format($v, 0, ',', '.')),

            Column::make("Total Transaksi", "total_transaksi")
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
