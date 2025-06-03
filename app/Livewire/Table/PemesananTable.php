<?php

namespace App\Livewire\Table;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Pemesanan;
use Illuminate\Database\Eloquent\Builder;

class PemesananTable extends DataTableComponent
{
    protected $model = Pemesanan::class;

    public function configure(): void
    {
        $this->setPrimaryKey('pemesanan_id');
    }

    public function builder() :Builder
    {
        return Pemesanan::with(['pelanggan', 'paketWisata', 'mobil'])
            ->orderBy('created_at', 'desc');
    }

    public function columns(): array
    {
        return [
            Column::make("Pemesanan ID", "pemesanan_id")->sortable(),

            Column::make("Pemesan", "pemesan_id")
                ->sortable()
                ->format(fn($v, $row) => optional($row->pelanggan)->nama_pemesan ?? '-'),

            Column::make("Paket Wisata", "paketwisata_id")
                ->sortable()
                ->format(fn($v, $row) => optional($row->paketWisata)->judul ?? '-'),

            Column::make("Mobil", "mobil_id")
                ->sortable()
                ->format(fn($v, $row) => optional($row->mobil)->nama_kendaraan ?? '-'),

            Column::make("Jam Mulai", "jam_mulai")->sortable(),
            Column::make("Tanggal Keberangkatan", "tanggal_keberangkatan")->sortable(),

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
