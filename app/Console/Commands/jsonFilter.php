<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\VarDumper\VarDumper;
use Illuminate\Support\Facades\Storage;


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
        // var_dump($data);
        $path = 'public/data/items/items-cache-data.json';
        $data = Storage::get($path);
        $this->filterGeTrade($data);
    }
    private function filterGeTrade(string $data)
    {
        $items = json_decode($data);
        collect($items)->take()->dd();
        
    }
}
