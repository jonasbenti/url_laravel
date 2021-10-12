<?php

namespace App\Jobs;

use App\Models\ModelUrl;
use App\Models\ModelUrlResponse;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class RequestAllUrls implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $urls = ModelUrl::all();
        foreach ($urls as $url) {
            $response = Http::get($url->description_url);
            ModelUrl::where(['id' => $url->id])->update([
                'status_code' => $response->status(),
                'response' => $response->body()
            ]);
            ModelUrlResponse::create([
                'id_url' => $url->id,
                'status_code' => $response->status(),
                'response' => $response->body()
            ]);
        }
    }
}
