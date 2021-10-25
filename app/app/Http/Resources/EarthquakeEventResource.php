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
            
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,

            'regionCode' => $this->regionCode,
            'regionCodeLabel' => $this->regionCodeLabel,

            'area' => $this->area,

            'eqMagnitude' => $this->eqMagnitude,
            'eqDepth' => $this->eqDepth,
            'eqMagUnk' => $this->eqMagUnk,

            'year' => $this->year,
            'month' => $this->month,
            'day' => $this->day,
            'hour' => $this->hour,
            'minute' => $this->minute,
            'second' => $this->second,

            'intensity' => $this->intensity,
            'intensityLabel' => $this->intensityLabel,

            'tsunamiEventId' => $this->tsunamiEventId,
            'volcanoEventId' => $this->volcanoEventId,

            'damageAmountOrder' => (int)$this->damageAmountOrder,
            'damageAmountOrderLabel' => $this->damageAmountOrderLabel,
            'damageMillionsDollars' => $this->damageMillionsDollars,


            'housesDestroyed' => $this->housesDestroyed,
            'housesDestroyedAmountOrder' => (int)$this->housesDestroyedAmountOrder,
            'housesDestroyedAmountOrderLabel' => $this->housesDestroyedAmountOrderLabel,
            'housesDestroyedTotal' => $this->housesDestroyedTotal,
           
            'housesDamaged' => $this->housesDamaged,
            'housesDamagedAmountOrder' => (int)$this->housesDamagedAmountOrder,
            'housesDamagedAmountOrderLabel' => $this->housesDamagedAmountOrderLabel,
            'housesDamagedTotal' => $this->housesDamagedTotal,

            'injuries' => $this->injuries,
            'injuriesAmountOrder' => (int)$this->injuriesAmountOrder,
            'injuriesAmountOrderLabel' => $this->injuriesAmountOrderLabel,
            'injuriesTotal' => $this->injuriesTotal,

            'missing' => $this->missing,
            'missingAmountOrder' => (int)$this->missingAmountOrder,
            'missingAmountOrderLabel' => $this->missingAmountOrderLabel,
            'missingTotal' => $this->missingTotal,

            'deaths' => $this->deaths,
            'deathsAmountOrder' => (int)$this->deathsAmountOrder,
            'deathsAmountOrderLabel' => $this->deathsAmountOrderLabel,

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
