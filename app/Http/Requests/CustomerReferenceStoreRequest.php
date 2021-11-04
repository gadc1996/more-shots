<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerReferenceStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required'],
        ];
    }
}
