<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $fillable = [
        'price',
        'payed',
        'guests_number',
        'location',
        'comments',
        'datetime',
    ];
}
