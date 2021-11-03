<?php

namespace App\Http\Resources;

class VolcanoMapResource extends BaseResource
{
    public function toArray($request)
    {
        return json_decode($this->geoJson);
    }
}
