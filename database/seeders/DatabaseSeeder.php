<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $file_path = storage_path('data/filter/');
        $file_count = count(File::files($file_path));


        if ($file_count == 0) {
            Artisan::call("osrs:filter");
        }
    
        for ($key = 0; $key <= $file_count - 1; $key++) {
            $file_path = storage_path('data/filter/'.$key.".json");
            $data = json_decode(File::get($file_path), true);
            foreach ($data as $row) {
                DB::table("items")->insert($row);
            }
        }
        
    }
}
