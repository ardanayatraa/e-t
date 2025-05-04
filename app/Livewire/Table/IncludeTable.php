<?php

namespace App\Livewire\Table;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\IncludeModel;

class IncludeTable extends DataTableComponent
{
    protected $model = IncludeModel::class;

    public function configure(): void
    {
        $this->setPrimaryKey('include_id');
    }

    public function columns(): array
    {
        return [
            Column::make("Include id", "include_id")
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
                    'rowId'     => $row->include_id,
                    'editUrl'   => route('include.edit', $row->include_id),
                    'deleteUrl' => route('include.destroy', $row->include_id),
                ])->render())
                ->html(),
        ];
    }
}
