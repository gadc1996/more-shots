<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventTypeUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => [],
        ];
    }
}
