<?php

namespace App\Livewire\Table;

use App\Models\IncludeModel;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Ketersediaan;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
class KetersediaanTable extends DataTableComponent
{
    protected $model = Ketersediaan::class;

    public function configure(): void
    {
        $this->setPrimaryKey('terpesan_id');
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
            Column::make("sopir id", "sopir_id")
                ->sortable(),
            Column::make("Tanggal keberangkatan", "tanggal_keberangkatan")
                ->sortable(),
            Column::make("Status ketersediaan", "status_ketersediaan")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),

            Column::make('Actions')
                ->label(fn($row) => view('components.table-action', [
                    'rowId' => $row->terpesan_id,
                    'editUrl' => route('ketersediaan.edit', $row->terpesan_id),
                    'deleteUrl' => route('ketersediaan.destroy', $row->terpesan_id),
                    'downloadId' => $row->terpesan_id,
                ]))
                ->html(),


        ];
    }


    public function downloadTicket($id)
    {
        $ketersediaan = Ketersediaan::with(['transaksi', 'include', 'exclude'])->find($id);
        $pdf = Pdf::loadView('pdf.ticket-on-admin', ['ketersediaan' => $ketersediaan]);

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'tiket-' . $ketersediaan->terpesan_id . '.pdf');
    }
}
