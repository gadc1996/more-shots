<?php namespace App\Traits;

trait CustomerAttributesTrait {
    public function initializeCustomerAttributesTrait()
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

