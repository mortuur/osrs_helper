<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GE_price_5m extends Model
{
    use HasFactory;

    protected $table = "GE_price_5m";

    protected $fillable = [
        "item_id",
        "avgHighPrice",
        "highPriceVolume",
        "avgLowPrice",
        "lowPriceVolume"
    ];
}
