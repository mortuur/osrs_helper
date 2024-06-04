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
        $file_path = public_path('storage/data/filter/');
        var_dump($file_path);
        var_dump(realpath($file_path));

        var_dump(File::isDirectory($file_path));
        exit;
        if (File::isDirectory($file_path)){
            echo "dir true";
            if (count(File::files($file_path)) > 0) {
                echo("records bestaan");
            } else {
                $path = 'storage/data/items/items-cache-data.json';
                $data = Storage::get($path);
                $this->filterGeTrade($data);
            }
        }
            // C:\Users\bartp\OneDrive\osrs_project\public\storage\filter

    }
    private function filterGeTrade(string $data)
    {
        $items = json_decode($data);
        $item_filter = collect($items)->where("tradeable_on_ge", true);
        
        $key = 0;
        $record_count = 0;

        foreach ($item_filter as $item )
        {
            $files[$key][] = $item;
            $record_count ++;
            if( $record_count === 1000){
                $key++;
                $record_count = 0;
            }
        }
        $key = 0;
        foreach ($files as $file)
        {
            file_put_contents('public/storage/filter/'.$key.'.json', json_encode($file));
            $key++;
        }
    }
}
