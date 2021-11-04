<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'first_name' => [],
            'last_name' => [],
            'email' => [],
            'phone_number' => [],
        ];
    }
}
