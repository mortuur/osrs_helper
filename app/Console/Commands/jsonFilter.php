<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\VarDumper\VarDumper;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;



class jsonFilter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'osrs:filter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->filter();
    }
    private function filter()
    {
        $file_path = storage_path('data/filter/');

        if (File::isDirectory($file_path)){
            if (count(File::files($file_path)) > 0) {
                echo("records bestaan");
            } else {
                $path = storage_path('data/items/items-cache-data.json');
                $data = File::get($path);
                $this->filterGeTrade($data);
            }
        }
    }
    private function filterGeTrade($data)
    {
        $items = json_decode($data);
        $item_filter = collect($items)->where("tradeable_on_ge", true);
        
        $key = 0;
        $record_count = 0;

        foreach ($item_filter as $item )
        {
            $files[$key][] = $item;
            $record_count ++;
            if( $record_count === 500){
                $key++;
                $record_count = 0;
            }
        }
        $key = 0;
        foreach ($files as $file)
        {
            fopen("storage/data/filter/".$key.".json", "w");
            file_put_contents('storage/data/filter/'.$key.'.json', json_encode($file));
            $key++;
        }
    }
}
