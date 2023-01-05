<?php

namespace App\Http\Livewire;

use App\Models\Website;
use App\Models\WebsiteRunpagespeed;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class ExperienceTable extends DataTableComponent
{
    protected $model = WebsiteRunpagespeed::class;

    public $website;
    public $strategy;

    public function mount(Website $website, $strategy)
    {
        $this->website = $website;
        $this->strategy = $strategy;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setSearchStatus(false);
        $this->setRefreshTime(60000);
        // $this->setRefreshVisible();
    }

    public function builder(): Builder
    {
        return WebsiteRunpagespeed::query()
            ->where('website_id', $this->website->id)
            ->where('strategy', $this->strategy);
    }


    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),

            Column::make("First Contentful Paint", 'first_contentful_paint')
                ->format(
                    fn ($value) => $value['displayValue']
                ),

            Column::make("Time to Interactive", 'interactive')
                ->format(
                    fn ($value) => $value['displayValue']
                ),

            Column::make("Speed Index", 'speed_index')
                ->format(
                    fn ($value) => $value['displayValue']
                ),

            Column::make("Total Blocking Time", 'total_blocking_time')
                ->format(
                    fn ($value) => $value['displayValue']
                ),

            Column::make("Largest Contentful Paint", 'largest_contentful_paint')
                ->format(
                    fn ($value) => $value['displayValue']
                ),

            Column::make("Cumulative Layout Shift", 'cumulative_layout_shift')
                ->format(
                    fn ($value) => $value['displayValue']
                ),

            Column::make("效能", 'performance_score')
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
        ];
    }
}
