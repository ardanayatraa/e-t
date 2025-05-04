<?php

namespace App\Livewire\Table;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Mobil;
use Illuminate\Support\Facades\Storage;

class MobilTable extends DataTableComponent
{
    protected $model = Mobil::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Tipemobil id", "mobil_id")
                ->sortable(),
            Column::make("Sopir id", "sopir_id")
                ->sortable(),
            Column::make("Nama kendaraan", "nama_kendaraan")
                ->sortable(),
            Column::make("Nomor kendaraan", "nomor_kendaraan")
                ->sortable(),
            Column::make("Jumlah tempat duduk", "jumlah_tempat_duduk")
                ->sortable(),
            Column::make("Status ketersediaan", "status_ketersediaan")
                ->sortable(),
            Column::make("Foto", "foto")
                ->format(fn($value, $row) =>
                    '<img src="'.Storage::url($value).'" '
                  . 'alt="'.e($row->nama_kendaraan).'" '
                  . 'class="w-20 h-20 object-cover rounded-md" />'
                )
                ->html(),

            Column::make('Actions')
                ->label(fn($row) => view('components.table-action', [
                    'rowId'     => $row->mobil_id,
                    'editUrl'   => route('mobil.edit', $row->mobil_id),
                    'deleteUrl' => route('mobil.destroy', $row->mobil_id),
                ])->render())
                ->html(),
        ];
    }
}
