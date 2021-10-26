<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventTypeStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => [],
        ];
    }
}
