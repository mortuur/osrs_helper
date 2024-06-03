<?php

// app/Models/ExchangeLog.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExchangeLog extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'date',
        'time',
        'state',
        'slot',
        'item',
        'qty',
        'worth',
        'max',
        'offer',
    ];
}
