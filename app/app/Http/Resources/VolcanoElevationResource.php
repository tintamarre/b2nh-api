<?php

namespace App\Http\Resources;

class VolcanoElevationResource extends BaseResource
{
    public function toArray($request)
    {
        return (int)$this->elevation;
    }
}
