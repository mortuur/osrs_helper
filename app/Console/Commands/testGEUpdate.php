<?php

namespace App\Console\Commands;

use App\Models\GE_price;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class testGEUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'osrs:test-g-e-update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $ge_data = $this->curlGEData();
        
        if (!empty($ge_data)) {
            if (GE_price::find(1)) {
                $this->update($ge_data);
            } else {
                $this->add($ge_data);
            }
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
    private function update(array $GE): void
    {
        foreach ($GE["data"] as $item_id => $values) {
            try {
                GE_price::find($item_id)->update([
                    'high' => $values['high'],
                    'highTime' => $values['highTime'],
                    'low' => $values['low'],
                    'lowTime' => $values['lowTime']
                ]);
            } catch (\Exception $e) {
                Log::error("Error update record with item_id: $item_id - " . $e->getMessage());
                dd("Error update record with item_id: $item_id - " . $e->getMessage());
            }
        }
    }
    private function add(array $GE): void
    {

        foreach ($GE["data"] as $item_id => $values) {
            try {
                DB::table('ge_prices')->insert([
                    'item_id' => $item_id,
                    'high' => $values['high'],
                    'highTime' => $values['highTime'],
                    'low' => $values['low'],
                    'lowTime' => $values['lowTime']
                ]);
            } catch (\Exception $e) {
                Log::error("Error inserting record with item_id: $item_id - " . $e->getMessage());
                dd("Error inserting record with item_id: $item_id - " . $e->getMessage());
            }
        }
    }
}
