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

            'events_count_total' => (int)$this->events_count_total,
     
            // 'volcano_events' => new VolcanoEventsResource($this->whenLoaded('volcano_events')),
            // 'tsunami_events' => new TsunamiEventsResource($this->whenLoaded('tsunami_events')),
            // 'earthquake_events' => new VolcanoEventsResource($this->whenLoaded('earthquake_events')),
     

            'links' => [
                'self' => route('api.volcanoes.show', ['volcano_id' => $this->id]),
                'external_map_url' => $this->external_map_url
                ]
        ];
    }
}
