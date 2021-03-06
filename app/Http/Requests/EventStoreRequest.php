<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventStoreRequest extends FormRequest
{
   public function rules()
    {
        return [
            'price' => [],
            'payed' => [],
            'comments' => [],
            'guests_number' => [],
            'shots_total' => [],
            'location' => [],
            'datetime' => [],
        ];
    }
}
