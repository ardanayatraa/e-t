<?php

namespace App\Livewire\Table;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\PaketWisata;
use Illuminate\Support\Facades\Storage;

class PaketWisataTable extends DataTableComponent
{
    protected $model = PaketWisata::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Paketwisata id", "paketwisata_id")
                ->sortable(),
            Column::make("Judul", "judul")
                ->sortable(),
            Column::make("Tempat", "tempat")
                ->sortable(),
            Column::make("Deskripsi", "deskripsi")
                ->sortable(),
            Column::make("Durasi", "durasi")
                ->sortable(),
            Column::make("Foto", "foto")
                ->format(fn($value, $row) =>

                    '<img src="'.Storage::url($value).'" '
                  . 'alt="'.e($row->judul).'" '
                  . 'class="w-20 h-20 object-cover rounded-md" />'
                )
                ->html(),
            Column::make("Harga", "harga")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
