<?php

namespace App\Http\Livewire;

use App\Models\Website;
use App\Models\WebsiteRunpagespeed;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class RunpagespeedTable extends DataTableComponent
{
    protected $model = WebsiteRunpagespeed::class;

    public $website;
    public $strategy;

    public function mount(Website $website, $strategy)
    {
        $this->website = $website;
        $this->strategy = $strategy;
    }

    public function builder(): Builder
    {
        return WebsiteRunpagespeed::query()
            ->where('website_id', $this->website->id)
            ->where('strategy', $this->strategy); // Eager load anything
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setSearchStatus(false);
        $this->setRefreshTime(60000);
        // $this->setRefreshVisible();
    }

    public function columns(): array
    {


        return [
            Column::make("Id", "id")
                ->sortable(),

            Column::make("Largest Contentful Paint (LCP)", 'loading_experience')
                ->format(
                    fn ($value) => !empty($value['metrics']['LARGEST_CONTENTFUL_PAINT_MS']) ?
                        $value['metrics']['LARGEST_CONTENTFUL_PAINT_MS']['category']  . ' / ' . $value['metrics']['LARGEST_CONTENTFUL_PAINT_MS']['percentile'] . ' ms' : 'NULL'

                ),

            Column::make("First Input Delay (FID)", 'loading_experience')
                ->format(
                    fn ($value) => !empty($value['metrics']['FIRST_INPUT_DELAY_MS']) ? $value['metrics']['FIRST_INPUT_DELAY_MS']['category'] . " / " .
                        $value['metrics']['FIRST_INPUT_DELAY_MS']['percentile'] . " ms" : 'NULL'
                ),

            Column::make("Cumulative Layout Shift (CLS)", 'loading_experience')
                ->format(
                    fn ($value) => !empty($value['metrics']['CUMULATIVE_LAYOUT_SHIFT_SCORE']) ? $value['metrics']['CUMULATIVE_LAYOUT_SHIFT_SCORE']['category'] . " / " . $value['metrics']['CUMULATIVE_LAYOUT_SHIFT_SCORE']['percentile'] . " ms" : 'NULL'
                ),

            Column::make("First Contentful Paint (FCP)", 'loading_experience')
                ->format(
                    fn ($value) => !empty($value['metrics']['FIRST_CONTENTFUL_PAINT_MS']) ? $value['metrics']['FIRST_CONTENTFUL_PAINT_MS']['category'] . " / " . $value['metrics']['FIRST_CONTENTFUL_PAINT_MS']['percentile'] . " ms" : 'NULL'
                ),

            Column::make("Interaction to Next Paint (INP)", 'loading_experience')
                ->format(
                    fn ($value) => !empty($value['metrics']['EXPERIMENTAL_INTERACTION_TO_NEXT_PAINT']) ? $value['metrics']['EXPERIMENTAL_INTERACTION_TO_NEXT_PAINT']['category'] . " / " . $value['metrics']['EXPERIMENTAL_INTERACTION_TO_NEXT_PAINT']['percentile'] . " ms" : 'NULL'
                ),

            Column::make("Time to First Byte (TTFB)", 'loading_experience')
                ->format(
                    fn ($value) => !empty($value['metrics']['EXPERIMENTAL_TIME_TO_FIRST_BYTE']) ? $value['metrics']['EXPERIMENTAL_TIME_TO_FIRST_BYTE']['category'] . " / " . $value['metrics']['EXPERIMENTAL_TIME_TO_FIRST_BYTE']['percentile'] . " ms" : 'NULL'
                ),

            Column::make("Created at", "created_at")
                ->sortable(),
        ];
    }
}
