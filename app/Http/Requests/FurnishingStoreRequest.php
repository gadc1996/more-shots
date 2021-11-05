<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FurnishingStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => [],
        ];
    }
}
