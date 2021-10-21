<?php

namespace App\Http\Resources;

class VolcanoEventResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'year' => $this->year,
            'month' => $this->month,
            'day' => $this->day,
            
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            
            'earthquakeEventId' => $this->earthquakeEventId,
            'tsunamiEventId' => $this->tsunamiEventId,
            'volcanoLocationId' => $this->volcanoLocationId,

          
            'damageAmountOrder' => $this->damageAmountOrder,
            'damageAmountOrderLabel' => $this->damageAmountOrderLabel,

            'damageMilliomDollars' => $this->damageMilliomDollars,

            'houseDestroyed' => $this->houseDestroyed,
            'houseDestroyedAmountOrder' => $this->houseDestroyedAmountOrder,
            'houseDestroyedAmountOrderLabel' => $this->houseDestroyedAmountOrderLabel,

            'injuries' => $this->injuries,
            'injuriesAmountOrder' => $this->injuriesAmountOrder,
            'injuriesAmountOrderLabel' => $this->injuriesAmountOrderLabel,

            'injuriesTotal' => $this->injuriesTotal,

            'missing' => $this->missing,
            'missingAmountOrder' => $this->missingAmountOrder,
            'missingAmountOrderLabel' => $this->missingAmountOrderLabel,

            'deaths' => $this->deaths,
            'deathsAmountOrder' => $this->deathsAmountOrder,
            'deathsAmountOrderLabel' => $this->deathsAmountOrderLabel,
            // Volcano Explosivity Index
            'vei' => $this->vei,

            'comments' => $this->comments,

            'earthquake_event' => new EarthquakeEventResource($this->whenLoaded('earthquake_event')),
            'tsunami_event' => new TsunamiEventResource($this->whenLoaded('tsunami_event')),
            'volcano' => new VolcanoResource($this->whenLoaded('volcano')),

            'tsunami_events' => TsunamiEventResource::collection($this->whenLoaded('tsunami_events')),
            'earthquake_events' => EarthquakeEventResource::collection($this->whenLoaded('earthquake_events')),

            'links' => [
                'self' => route('api.volcano_events.show', ['volcano_event_id' => $this->id]),
                ]
            
        ];
    }
}
