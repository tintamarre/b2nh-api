<?php

namespace App\Http\Resources;

class VolcanoResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'country' => $this->country,
            'location' => $this->location,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'elevation' => $this->elevation,
            'morphology' => $this->morphology,

            'events_count' => (int)$this->events_count,
     
            'volcano_events' => VolcanoEventResource::collection($this->whenLoaded('volcano_events')),
            'tsunami_events' => TsunamiEventResource::collection($this->whenLoaded('tsunami_events')),

            'external' => [
                'external_map_url' => $this->external_map_url,
                'external_wikipedia_url' => $this->external_wikipedia_url
                // 'external_image' => $this->external_image_url
            ],
            'links' => [
                'self' => route('api.volcanoes.show', ['volcano_id' => $this->id]),
     
                ]
        ];
    }
}
