<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class pullDataController extends Controller
{
    public function curl()
    {
        $data = Http::get('https://www.osrsbox.com/osrsbox-db/items-complete.json');
        $result = json_decode($data);

        dd($result);
    }
}