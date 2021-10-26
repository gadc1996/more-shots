<?php namespace App\Traits;

trait WaiterAttributesTrait{
    public function initializeWaiterAttributesTrait()
    {
        $this->fillable = [
            'first_name',
            'last_name',
            'email',
            'phone_number'
        ];

        $this->appends = [
            'full_name',
        ];
    }
}

