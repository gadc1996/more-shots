<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FurnishingUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => [],
        ];
    }
}
