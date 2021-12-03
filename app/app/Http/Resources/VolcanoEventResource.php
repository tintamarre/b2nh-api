<?php

namespace App\Http\Resources;

use Carbon\Carbon;

class VolcanoEventResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id' => (int)$this->id,

            'emoji' => "🌋",
            'type' => (string)$this->type,
            'class_basename' => $this->class_basename,

            'year' => (int)$this->year,
            'month' => (int)$this->month,
            'day' => (int)$this->day,

            'longitude' => (float)$this->longitude,
            'latitude' => (float)$this->latitude,

            // 'geoJson' => json_decode($this->geoJson),

            'dateTimeForInfoPanel' => $this->dateTime->isoFormat('DD MMMM Y'),
            'dateTimeForDolorean' => $this->dateTime->isoFormat('YYYY-MM-DD HH:mm:ss z'),

            'dateTime' => $this->dateTime->toCookieString(),
            'dateTimeDiffForHumans' => $this->dateTimeDiffForHumans,
  
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            
            'duration' => $this->duration,

            // Volcano Explosivity Index
            'volcano_explosivity_index' => (int)$this->vei,
            'volcano_explosivity_index_details' => $this->veiDetails,

            'damageAmountOrder' => (int)$this->damageAmountOrder,
            'damageAmountOrderLabel' => $this->damageAmountOrderLabel,

            'damageMillionsDollars' => (int)$this->damageMillionsDollars,

            'housesDestroyed' => (int)$this->houseDestroyed,
            'housesDestroyedAmountOrder' => (int)$this->houseDestroyedAmountOrder,
            'housesDestroyedAmountOrderLabel' => $this->houseDestroyedAmountOrderLabel,

            'injuries' => (int)$this->injuries,
            'injuriesAmountOrder' => (int)$this->injuriesAmountOrder,
            'injuriesAmountOrderLabel' => $this->injuriesAmountOrderLabel,
            'injuriesTotal' => (int)$this->injuriesTotal,

            'missing' => (int)$this->missing,
            'missingAmountOrder' => (int)$this->missingAmountOrder,
            'missingAmountOrderLabel' => $this->missingAmountOrderLabel,

            'deaths' => (int)$this->deaths,
            'deathsAmountOrder' => (int)$this->deathsAmountOrder,
            'deathsAmountOrderLabel' => $this->deathsAmountOrderLabel,
 
            'comments' => $this->comments,

            'earthquakeEventId' => (int)$this->earthquakeEventId,
            'tsunamiEventId' => (int)$this->tsunamiEventId,
            'volcanoLocationId' => (int)$this->volcanoLocationId,


            'earthquake_event' => new EarthquakeEventResource($this->whenLoaded('earthquake_event')),
            'tsunami_event' => new TsunamiEventResource($this->whenLoaded('tsunami_event')),

            'volcano' => new VolcanoResource($this->whenLoaded('volcano')),

            'tsunami_events' => TsunamiEventResource::collection($this->whenLoaded('tsunami_events')),
            'earthquake_events' => EarthquakeEventResource::collection($this->whenLoaded('earthquake_events')),

            'external' => [
                'external_image' => route('api.images.getUrl', ['category' => 'volcano', 'item' => urlencode($this->volcano->name)]),
            ],

            'links' => [
                'self' => route('api.events.show', [
                    'type' => 'volcano',
                    'event_id' => $this->id
                ]),
                ]
            
        ];
    }
}
