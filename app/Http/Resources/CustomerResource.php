<?php namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'first_name' => $this->first_name,
            'full_name' => $this->full_name,
            'last_name' => $this->last_name,
            'phone_number' => $this->phone_number,
        ];
    }
}
