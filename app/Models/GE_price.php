<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GE_price extends Model
{
    use HasFactory;

    protected $table = "GE_price";

    protected $fillable = [
        "item_id",
        "high",
        "hightime",
        "low",
        "lowtime",
    ];
}
