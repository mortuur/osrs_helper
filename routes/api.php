<?php

use Illuminate\Http\Request;
use App\Http\Controllers\OsrsItems;
use Illuminate\Support\Facades\Route;

Route::get('/items', [OsrsItems::class, 'GetItems']);
