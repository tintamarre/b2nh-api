<?php

namespace App\Http\Resources;

class VolcanoesResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id' => (int)$this->id,
            'class_basename' => $this->class_basename,

            'type' => "volcano",
            'emoji' => "🌋",

            'name' => $this->name,
            'country' => $this->country,
            
            'longitude' => (float)$this->longitude,
            'latitude' => (float)$this->latitude,

            'elevation' => $this->elevation,
            'morphology' => $this->morphology,

            'geoJson' => json_decode($this->geoJson),

            'events_count' => (int)$this->events_count,

            'links' => [
                'self' => route('api.volcanoes.show', ['volcano_id' => $this->id]),
     
                ]
        ];
    }
}
