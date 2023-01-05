<?php

namespace App\Console\Commands;

use App\Models\Website;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class RunPSI extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'PSI:run {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'curl PSI API and save to db';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $id = $this->argument('id');
        $website = Website::find($id);

        $response = Http::get('https://www.googleapis.com/pagespeedonline/v5/runPagespeed?url=' . $website->url)->json();


        $website->pagespeedinsights()->create([
            'LCP_percentile' => $response['loadingExperience']['metrics']['LARGEST_CONTENTFUL_PAINT_MS']['percentile'],
            'LCP_distribution_good' => $response['loadingExperience']['metrics']['LARGEST_CONTENTFUL_PAINT_MS']['distributions'][0]['proportion'],
            'LCP_distribution_need_improvement' => $response['loadingExperience']['metrics']['LARGEST_CONTENTFUL_PAINT_MS']['distributions'][1]['proportion'],
            'LCP_distribution_poor' => $response['loadingExperience']['metrics']['LARGEST_CONTENTFUL_PAINT_MS']['distributions'][2]['proportion'],
            'LCP_category' => $response['loadingExperience']['metrics']['LARGEST_CONTENTFUL_PAINT_MS']['category'],

            'FID_percentile' => $response['loadingExperience']['metrics']['FIRST_INPUT_DELAY_MS']['percentile'],
            'FID_distribution_good' => $response['loadingExperience']['metrics']['FIRST_INPUT_DELAY_MS']['distributions'][0]['proportion'],
            'FID_distribution_need_improvement' => $response['loadingExperience']['metrics']['FIRST_INPUT_DELAY_MS']['distributions'][1]['proportion'],
            'FID_distribution_poor' => $response['loadingExperience']['metrics']['FIRST_INPUT_DELAY_MS']['distributions'][2]['proportion'],
            'FID_category' => $response['loadingExperience']['metrics']['FIRST_INPUT_DELAY_MS']['category'],

            'CLS_percentile' => $response['loadingExperience']['metrics']['CUMULATIVE_LAYOUT_SHIFT_SCORE']['percentile'],
            'CLS_distribution_good' => $response['loadingExperience']['metrics']['CUMULATIVE_LAYOUT_SHIFT_SCORE']['distributions'][0]['proportion'],
            'CLS_distribution_need_improvement' => $response['loadingExperience']['metrics']['CUMULATIVE_LAYOUT_SHIFT_SCORE']['distributions'][1]['proportion'],
            'CLS_distribution_poor' => $response['loadingExperience']['metrics']['CUMULATIVE_LAYOUT_SHIFT_SCORE']['distributions'][2]['proportion'],
            'CLS_category' => $response['loadingExperience']['metrics']['CUMULATIVE_LAYOUT_SHIFT_SCORE']['category'],

            'overall_category' => $response['loadingExperience']['overall_category'],
        ]);
    }
}
