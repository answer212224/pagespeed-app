<?php

namespace App\Jobs;

use App\Models\Website;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ProcessWebsite implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $website;
    public $timeout = 300;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Website $website)
    {
        $this->website = $website;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $response = Http::get('https://www.googleapis.com/pagespeedonline/v5/runPagespeed?url=' . $this->website->url . "&locale=zh-TW")->json();

        if (!empty($response['loadingExperience']) && !empty($response['lighthouseResult'])) {
            $this->website->runpagespeeds()->create([
                'loading_experience' => $response['loadingExperience'],

                'first_contentful_paint' => $response['lighthouseResult']['audits']['first-contentful-paint'],

                'speed_index' => $response['lighthouseResult']['audits']['speed-index'],

                'total_blocking_time' => $response['lighthouseResult']['audits']['total-blocking-time'],

                'largest_contentful_paint' => $response['lighthouseResult']['audits']['largest-contentful-paint'],

                'cumulative_layout_shift' => $response['lighthouseResult']['audits']['cumulative-layout-shift'],

                'interactive' => $response['lighthouseResult']['audits']['interactive'],

                'performance_score' => $response['lighthouseResult']['categories']['performance']['score'] * 100,

                'strategy' => 'desktop'
            ]);
        }
    }
}
