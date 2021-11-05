<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShotUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => [],
        ];
    }
}
