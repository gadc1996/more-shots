<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'price' => $this->price,
            'payed' => $this->payed,
            'guests_number' => $this->guests_number,
            'location' => $this->location,
            'comments' => $this->comments,
        ];
    }
}
