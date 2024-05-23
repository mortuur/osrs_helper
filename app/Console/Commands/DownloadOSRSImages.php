<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class DownloadOSRSImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'download:osrs-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download OSRS item images and store them in the public directory';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $baseUrl = "https://oldschool.runescape.wiki";
        $itemsUrl = "https://oldschool.runescape.wiki/w/Module:Item_info/data";
        $imagesDir = public_path('osrs_images');

        // Maak de directory aan als deze niet bestaat
        if (!is_dir($imagesDir)) {
            mkdir($imagesDir, 0777, true);
        }

        // Download de items pagina
        $response = Http::get($itemsUrl);
        if ($response->failed()) {
            $this->error('Failed to retrieve
             items page.');
            return 1;
        }

        $html = $response->body();

        // Gebruik DOMDocument en DOMXPath om de afbeeldingen te parseren
        $doc = new \DOMDocument();
        libxml_use_internal_errors(true); // Negeer HTML fouten
        $doc->loadHTML($html);
        libxml_clear_errors();

        $xpath = new \DOMXPath($doc);
        $imgTags = $xpath->query("//img");

        foreach ($imgTags as $img) {
            $imgUrl = $img->getAttribute("src");
            if (strpos($imgUrl, "//") === 0) {
                $imgUrl = "https:" . $imgUrl;
            }

            $imgName = basename($imgUrl);
            $imgPath = $imagesDir . DIRECTORY_SEPARATOR . $imgName;

            // Download de afbeelding
            $imgData = Http::get($imgUrl)->body();
            file_put_contents($imgPath, $imgData);

            $this->info("Downloaded $imgName");
        }

        $this->info("Alle afbeeldingen zijn gedownload.");
        return 0;
    }
}
