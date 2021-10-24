<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number'
    ];
}
