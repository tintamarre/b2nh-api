<?php

namespace App\Http\Resources;

class TsunamiEventResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
    
            'locationName' => $this->locationName,
            'country' => $this->country,
            
            'year' => $this->year,
            'month' => $this-> month,
            'day' => $this->day,
            'hour' => $this->hour,
            'minute' => $this->minute,
            'second' => $this->second,

            'regionCode' => $this->regionCode,
            'causeCode' => $this->causeCode,
            'eventValidity' => $this->eventValidity,

            'earthquakeEventId' => $this->earthquakeEventId,
            'volcanoLocationId' => $this->volcanoLocationId,
            'volcanoEventId' => $this->volcanoEventId,

            'damageAmountOrder' => $this->damageAmountOrder,
            'damageMillionsDollars' => $this->damageMillionsDollars,
   
            'deathsAmountOrder' => $this->deathsAmountOrder,

            'housesDestroyed' => $this->housesDestroyed,
            'housesDestroyedAmountOrder' => $this->housesDestroyedAmountOrder,

            'housesDamaged' => $this->housesDamaged,
            'housesDamagedAmountOrder' => $this->housesDamagedAmountOrder,


            'injuries' => $this->injuries,
            'injuriesAmountOrder' => $this->injuriesAmountOrder,

            'maxWaterHeight' => $this->maxWaterHeight,
       
            'tsMtAbe' => $this->tsMtAbe,

            'area' => $this->area,

            'missing' => $this->missing,
            'missingAmountOrder' => $this->missingAmountOrder,

            'deaths' => $this->deaths,

            'comments' => $this->comments,

            'latitude' => $this->latitude,
            'longitude' => $this->longitude,

            'earthquake_event' => new EarthquakeEventResource($this->whenLoaded('earthquake_event')),
            'volcano_event' => new VolcanoEventResource($this->whenLoaded('volcano_event')),
            'volcano' => new VolcanoResource($this->whenLoaded('volcano')),

            'volcano_events' => VolcanoEventResource::collection($this->whenLoaded('volcano_events')),
            'earthquake_events' => EarthquakeEventResource::collection($this->whenLoaded('earthquake_events')),
 
            'links' => [
                'self' => route('api.tsunami_events.show', ['tsunami_event_id' => $this->id])
                ]

        ];
    }
}
