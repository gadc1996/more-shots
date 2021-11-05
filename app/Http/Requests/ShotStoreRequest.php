<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShotStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => [],
        ];
    }
}
