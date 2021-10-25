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
            
            // Volcano Explosivity Index
            'volcano_explosivity_index' => $this->vei,

            'damageAmountOrder' => (int)$this->damageAmountOrder,
            'damageAmountOrderLabel' => $this->damageAmountOrderLabel,

            'damageMilliomDollars' => $this->damageMilliomDollars,

            'houseDestroyed' => $this->houseDestroyed,
            'houseDestroyedAmountOrder' => (int)$this->houseDestroyedAmountOrder,
            'houseDestroyedAmountOrderLabel' => $this->houseDestroyedAmountOrderLabel,

            'injuries' => $this->injuries,
            'injuriesAmountOrder' => (int)$this->injuriesAmountOrder,
            'injuriesAmountOrderLabel' => $this->injuriesAmountOrderLabel,
            'injuriesTotal' => $this->injuriesTotal,

            'missing' => $this->missing,
            'missingAmountOrder' => (int)$this->missingAmountOrder,
            'missingAmountOrderLabel' => $this->missingAmountOrderLabel,

            'deaths' => $this->deaths,
            'deathsAmountOrder' => (int)$this->deathsAmountOrder,
            'deathsAmountOrderLabel' => $this->deathsAmountOrderLabel,
 
            'comments' => $this->comments,

            'earthquakeEventId' => $this->earthquakeEventId,
            'tsunamiEventId' => $this->tsunamiEventId,
            'volcanoLocationId' => $this->volcanoLocationId,


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
