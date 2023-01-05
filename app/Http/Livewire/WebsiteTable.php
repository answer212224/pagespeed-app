<?php

namespace App\Http\Livewire;

use App\Models\Website;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class WebsiteTable extends DataTableComponent
{
    protected $model = Website::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setSingleSortingDisabled();
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),

            Column::make("Url", "url")
                ->searchable()
                ->sortable(),
            LinkColumn::make('查看')
                ->title(fn ($row) => '查看')
                ->location(fn ($row) => route('websites.show', $row))
                ->attributes(fn ($row) => ['class' => 'underline text-indigo-700 hover:no-underline']),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),

            LinkColumn::make('刪除')
                ->title(fn ($row) => '刪除')
                ->location(fn ($row) => route('websites.delete', $row))
                ->attributes(fn ($row) => ['class' => 'underline text-red-500 hover:no-underline'])
                ->collapseOnMobile(),
        ];
    }
}
