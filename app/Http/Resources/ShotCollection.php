<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ShotCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
        ];
    }
}
