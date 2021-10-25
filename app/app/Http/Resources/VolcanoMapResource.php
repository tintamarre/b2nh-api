<?php

namespace App\Http\Resources;

class VolcanoMapResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'links' => [
                'self' => route('api.volcanoes.show', ['volcano_id' => $this->id]),
     
                ]
        ];
    }
}
