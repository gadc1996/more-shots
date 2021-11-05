<?php namespace App\Traits;

trait  EventAttributesTrait{
    public function initializeEventAttributesTrait()
    {
        $this->fillable = [
            'price',
            'payed',
            'shots_total',
            'guests_number',
            'location',
            'comments',
            'datetime',
        ];
    }
}


