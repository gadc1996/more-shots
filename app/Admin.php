<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{

    protected $hidden = [
        'password',
        'created_at',
        'updated_at',
    ];
}
