<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Waiter extends Model
{
    public $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number'
    ];

    public $appends = [
        'full_name',
    ];

    public function getFullNameAttribute()
    {
        return "$this->first_name $this->last_name";
    }
}
