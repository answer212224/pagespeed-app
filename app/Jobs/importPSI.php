<?php

namespace App\Jobs;

use App\Models\Website;
use App\Jobs\ProcessWebsite;
use Illuminate\Bus\Queueable;
use App\Jobs\ProcessMobileWebsite;
use Illuminate\Support\Facades\Bus;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Support\Facades\Log;

class importPSI implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $websites = Website::get();
        $websites->each(function ($item) {
            $batch = Bus::batch([
                new ProcessWebsite($item),

            ])->dispatch();
        });

        $websites->each(function ($item) {
            $batch = Bus::batch([
                new ProcessMobileWebsite($item),

            ])->dispatch();
        });
    }
}
