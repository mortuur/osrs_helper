<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Http\Controllers\pullDataController


Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::job(new Price_update())
            ->name('check_uptime:laravel.com')
            ->everyFiveMinutes()
            ->onOneServer();
