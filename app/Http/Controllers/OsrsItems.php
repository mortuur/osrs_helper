<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OsrsItems extends Controller
{
    public function GetItems()
    {
        $response = Http::get('https://www.osrsbox.com/osrsbox-db/items-complete.json');
        $data = json_decode($response->body());
        dd($data);
        return view('items', ['items' => $data]);
    }   
}
