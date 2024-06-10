<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class PriceUpdate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $ge_data[] = $this->curlGEData();

        if (!empty($ge_data)) {
            Log::debug(json_encode($ge_data)); // Zo log je in een queue.
        } else {
            Log::error('Unable to fetch GE data from RuneScape API');
        }
    }

    private function curlGEData()
    {
        try {
            $response = Http::get("https://prices.runescape.wiki/api/v1/osrs/latest");

            if ($response->successful()) {
                return $response->json();
            } else {
                Log::error('RuneScape API returned an error: ' . $response->status());
                return [];
            }
        } catch (\Exception $e) {
            Log::error('Error while fetching GE data: ' . $e->getMessage());
            return [];
        }
    }
    private function updateTable(array $data)
    {
        DB::table("ge_prices")->insert($data);
    }
    private function chunkData(array $data): array
    {
        
        $data = collect($data);
        $chunks = $data->chunk(500);
        $chunksArray = $chunks->toArray();
        return $chunksArray;
    }
}
