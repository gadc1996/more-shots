<?php namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Traits\WaiterAttributesTrait;

class Waiter extends Model
{
    use WaiterAttributesTrait;

    public function getFullNameAttribute()
    {
        return "$this->first_name $this->last_name";
    }
}
