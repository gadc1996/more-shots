<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventUpdateRequest extends FormRequest
{
   public function rules()
    {
        return [
            'price' => [],
            'payed' => [],
            'comments' => [],
            'guests_number' => [],
            'location' => [],
            'datetime' => [],
        ];
   }
}
