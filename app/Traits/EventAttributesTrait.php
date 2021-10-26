<?php namespace App\Traits;

trait  EventAttributesTrait{
    public function initializeEventAttributesTrait()
    {
        $this->fillable = [
            'price',
            'payed',
            'guests_number',
            'location',
            'comments',
            'datetime',
        ];
    }
}


