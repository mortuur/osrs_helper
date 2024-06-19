<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GE_price_1h extends Model
{
    use HasFactory;

    protected $table = "GE_price_1h";

    protected $fillable = [
        "item_id",
        "avgHighPrice",
        "highPriceVolume",
        "avgLowPrice",
        "lowPriceVolume"
    ];
}
