<?php

namespace App\Http\Resources;

class VolcanoEventResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
        ]

    }
}
