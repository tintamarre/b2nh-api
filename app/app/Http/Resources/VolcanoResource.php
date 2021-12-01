<?php

namespace App\Http\Resources;

class VolcanoResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id' => (int)$this->id,
            'class_basename' => $this->class_basename,

            'name' => $this->name,

            'country' => $this->country,
            'location' => $this->location,
            
            'longitude' => (float)$this->longitude,
            'latitude' => (float)$this->latitude,

            // 'geoJson' => json_decode($this->geoJson),


            'elevation' => (int)$this->elevation,
            'morphology' => $this->morphology,

            'events_count' => (int)$this->events_count,
     
            'volcano_events' => VolcanoEventResource::collection($this->whenLoaded('volcano_events')),
            'tsunami_events' => TsunamiEventResource::collection($this->whenLoaded('tsunami_events')),

            'external' => [
                'external_map_url' => $this->external_map_url,
                'external_wikipedia_url' => $this->external_wikipedia_url,
                'external_image' => route('api.images.getUrl', ['category' => 'volcano', 'item' => urlencode($this->name)]),

            ],
            'links' => [
                'self' => route('api.volcanoes.show', ['volcano_id' => $this->id]),
     
                ]
        ];
    }
}
