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

            'earthquake_event' => new EarthquakeEventResource($this->whenLoaded('earthquake_event')),
            'tsunami_event' => new TsunamiEventResource($this->whenLoaded('tsunami_event')),
            'volcano' => new VolcanoResource($this->whenLoaded('volcano')),

            'damageAmountOrder' => $this->damageAmountOrder,
            'damageMilliomDollars' => $this->damageMilliomDollars,

            'houseDestroyed' => $this->houseDestroyed,
            'houseDestroyedAmountOrder' => $this->houseDestroyedAmountOrder,

            'injuries' => $this->injuries,
            'injuriesAmountOrder' => $this->injuriesAmountOrder,
            'injuriesTotal' => $this->injuriesTotal,

            'missing' => $this->missing,
            'missingAmountOrder' => $this->missingAmountOrder,

            'deaths' => $this->deaths,
            'deathsAmountOrder' => $this->deathsAmountOrder,

            'vei' => $this->vei,

            'comments' => $this->comments
            
            
        ];
    }
}
