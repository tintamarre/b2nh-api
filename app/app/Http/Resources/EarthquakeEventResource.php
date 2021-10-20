<?php

namespace App\Http\Resources;

class EarthquakeEventResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,

            'locationName' => $this->locationName,
            'country' => $this->country,
            
            'year' => $this->year,
            'month' => $this->month,
            'day' => $this->day,
            'hour' => $this->hour,
            'minute' => $this->minute,
            'second' => $this->second,

            'latitude' => $this->latitude,
            'longitude' => $this->longitude,


            'regionCode' => $this->regionCode,

            'intensity' => $this->intensity,

            'tsunamiEventId' => $this->tsunamiEventId,
            'volcanoEventId' => $this->volcanoEventId,

            'damageAmountOrder' => $this->damageAmountOrder,
            'damageMillionsDollars' => $this->damageMillionsDollars,
   
            'deathsAmountOrder' => $this->deathsAmountOrder,

            'housesDestroyed' => $this->housesDestroyed,
            'housesDestroyedAmountOrder' => $this->housesDestroyedAmountOrder,
            'housesDestroyedTotal' => $this->housesDestroyedTotal,

            
            'housesDamaged' => $this->housesDamaged,
            'housesDamagedAmountOrder' => $this->housesDamagedAmountOrder,
            'housesDamagedTotal' => $this->housesDamagedTotal,
            
            'eqMagnitude' => $this->eqMagnitude,
            'eqDepth' => $this->eqDepth,
            'eqMagUnk' => $this->eqMagUnk,

            'injuries' => $this->injuries,
            'injuriesAmountOrder' => $this->injuriesAmountOrder,
            'injuriesTotal' => $this->injuriesTotal,

            'area' => $this->area,

            'missing' => $this->missing,
            'missingAmountOrder' => $this->missingAmountOrder,
            'missingTotal' => $this->missingTotal,

            'deaths' => $this->deaths,

            'comments' => $this->comments,

            'tsunami_event' => new TsunamiEventResource($this->whenLoaded('tsunami_event')),
            'volcano_event' => new VolcanoEventResource($this->whenLoaded('volcano_event')),

            'tsunami_events' => TsunamiEventResource::collection($this->whenLoaded('tsunami_events')),
            'volcano_events' => VolcanoEventResource::collection($this->whenLoaded('volcano_events')),


                        'links' => [
                'self' => route('api.earthquake_events.show', ['earthquake_event_id' => $this->id])
                ]

        ];
    }
}
