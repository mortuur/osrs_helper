<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class OsrsItems extends Controller
{
    public function GetItems()
    {
        $response = Http::get('https://www.osrsbox.com/osrsbox-db/items-complete.json');
        $data = $response->json();
        return view('items', ['items' => $data]);
    }   
}
