<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        "examine",
        "item_id",
        "members",
        "lowalch",
        "limit",
        "value",
        "highalch",
        "icon",
        "name"
    ];
}
