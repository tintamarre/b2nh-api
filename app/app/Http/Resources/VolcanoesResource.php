<?php

namespace App\Http\Resources;

class VolcanoesResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'class_basename' => $this->class_basename,

            'name' => $this->name,
            'country' => $this->country,
            'location' => $this->location,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'elevation' => $this->elevation,

            'events_count' => (int)$this->events_count,

            'links' => [
                'self' => route('api.volcanoes.show', ['volcano_id' => $this->id]),
     
                ]
        ];
    }
}
