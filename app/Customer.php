<?php namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Traits\CustomerAttributesTrait;

class Customer extends Model
{
    use CustomerAttributesTrait;

    public function getFullNameAttribute()
    {
        return "$this->first_name $this->last_name";
    }
}
