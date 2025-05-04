<?php

namespace App\Livewire\Table;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Exclude;

class ExcludeTable extends DataTableComponent
{
    protected $model = Exclude::class;

    public function configure(): void
    {
        $this->setPrimaryKey('exclude_id');
    }

    public function columns(): array
    {
        return [
            Column::make("Exclude id", "exclude_id")
                ->sortable(),
            Column::make("Pemesanan id", "pemesanan_id")
                ->sortable(),
            Column::make("Bensin", "bensin")
                ->sortable(),
            Column::make("Parkir", "parkir")
                ->sortable(),
            Column::make("sopir", "sopir")
                ->sortable(),
            Column::make("Makan siang", "makan_siang")
                ->sortable(),
            Column::make("Makan malam", "makan_malam")
                ->sortable(),
            Column::make("Tiket masuk", "tiket_masuk")
                ->sortable(),
            Column::make("Status ketersediaan", "status_ketersediaan")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
            Column::make('Actions')
                ->label(fn($row) => view('components.table-action', [
                    'rowId'     => $row->exclude_id,
                    'editUrl'   => route('exclude.edit', $row->exclude_id),
                    'deleteUrl' => route('exclude.destroy', $row->exclude_id),
                ])->render())
                ->html(),
        ];
    }
}
