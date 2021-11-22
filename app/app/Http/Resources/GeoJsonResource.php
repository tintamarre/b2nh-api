<?php

namespace App\Http\Resources;

class GeoJsonResource extends BaseResource
{
    public function toArray($request)
    {
        return json_decode($this->geoJson);
    }
}
