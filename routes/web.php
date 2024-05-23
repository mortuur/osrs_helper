<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OsrsItems;

// Route::get('/', function () {
//     return view('items');
// });

Route::get('/', [OsrsItems::class, 'GetItems']);
