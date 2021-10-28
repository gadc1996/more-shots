<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'comments' => $this->comments,
            'guests_number' => $this->guests_number,
            'location' => $this->location,
            'payed' => $this->payed,
            'price' => $this->price,
        ];
    }
}
