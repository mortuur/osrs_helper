<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tradeable_on_ge',
        'members',
        'linked_id_item',
        'linked_id_noted',
        'linked_id_placeholder',
        'noted',
        'noteable',
        'placeholder',
        'stackable',
        'equipable',
        'cost',
        'lowalch',
        'highalch',
        'stacked'
    ];
}
