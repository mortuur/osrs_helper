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
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $ge_data = $this->curlGEData();
        
        if (!empty($ge_data)) {
            // $data = $this->addItemID($ge_data);
            $this->updateTable($ge_data);
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
    // private function addItemID(array $data): array
    // {
        
    //     Log::debug($value);
    //     return $value;
    // }
    private function updateTable(array $GE)
    {
        foreach ($GE["data"] as $item_id => $values) {
            try {
                DB::table('ge_prices')->insert([
                    'item_id' => $item_id,
                    'high' => $values['high'],
                    'low' => $values['low'],
                ]);
            } catch (\Exception $e) {
                Log::error("Error inserting record with item_id: $item_id - " . $e->getMessage());
                dd("Error inserting record with item_id: $item_id - " . $e->getMessage());
            }
        }
    }
}
