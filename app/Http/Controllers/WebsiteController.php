<?php

namespace App\Http\Controllers;

use App\Models\Website;
use App\Charts\SampleChart;
use App\Jobs\ProcessWebsite;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Builder;

class WebsiteController extends Controller
{
    public function index()
    {

        $websites = Website::withCount([
            'runpagespeeds as runpagespeeds_desktop_count' => function (Builder $query) {
                $query->where('strategy', 'desktop');
            },
            'runpagespeeds as runpagespeeds_mobile_count' => function (Builder $query) {
                $query->where('strategy', 'mobile');
            }
        ])->withAvg([
            'runpagespeeds as runpagespeeds_desktop_avg' => function (Builder $query) {
                $query->where('strategy', 'desktop');
            },
            'runpagespeeds as runpagespeeds_mobile_avg' => function (Builder $query) {
                $query->where('strategy', 'mobile');
            }
        ], 'performance_score')
            ->get();




        return view('websites', compact('websites'));
    }

    public function show(Website $website)
    {
        $strategy = request('strategy');
        $runpagespeeds = $website->runpagespeeds()->where('strategy', $strategy)->limit(100)->latest()->get();

        if ($runpagespeeds->isEmpty()) {
            return back();
        }

        $runpagespeeds = $runpagespeeds->sort();

        $createds = $runpagespeeds->pluck('created_at')->map(function ($item, $key) {
            return $item->toDateTimeString();
        });


        $performances = $runpagespeeds->pluck('performance_score');

        $chart = new SampleChart;
        $chart->labels($createds->toArray());
        $chart->dataset('效能分數', 'line', $performances)->color('rgb(75, 192, 192)');

        return view('sample_view', compact('website', 'chart', 'strategy'));
    }

    public function store()
    {
        Website::create([
            'url' => request()->url
        ]);
        return back();
    }

    public function delete(Website $website)
    {
        $website->delete();

        return back();
    }

    public function test()
    {

        $url = request()->url;

        $response = Http::get('https://www.googleapis.com/pagespeedonline/v5/runPagespeed?url=' . $url . '&locale=zh-TW')->json();

        // session(['test' => $response]);
        // $response = session('test');

        if (!empty($response['loadingExperience']) || !empty($response['lighthouseResult'])) {
            dd($response);
        }
        dd($response);

        // dd($response);
        // $website = Website::find(21);

        // $r = $website->runpagespeeds->first();
        // dd($r->lighthouseResult);


        // $website->runpagespeeds()->create([
        //     'loading_experience' => $response['loadingExperience'],
        //     'lighthouse_result' => $response['lighthouseResult'],
        // ]);

        // $websites = Website::get();
        // $websites->each(function ($item, $key) {
        //     ProcessWebsite::dispatch($item);
        // });

    }
}
