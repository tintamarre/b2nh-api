<?php

namespace App\Http\Resources;

class EarthquakeEventResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
        ];
    }
}
