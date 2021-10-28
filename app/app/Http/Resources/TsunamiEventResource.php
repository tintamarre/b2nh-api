<?php

namespace App\Http\Resources;

class TsunamiEventResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'class_basename' => $this->class_basename,

            'year' => $this->year,
            'month' => $this-> month,
            'day' => $this->day,
            'hour' => $this->hour,
            'minute' => $this->minute,
            'second' => $this->second,

            'dateTime' => $this->dateTime,

            'locationName' => $this->locationName,
            'country' => $this->country,
            'area' => $this->area,

            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            
            'maxWaterHeight' => $this->maxWaterHeight,
            'tsMtAbe' => $this->tsMtAbe,

            'regionCode' => $this->regionCode,
            'regionCodeLabel' => $this->regionCodeLabel,

            'causeCode' => $this->causeCode,
            'causeCodeLabel' => $this->causeCodeLabel,

            'eventValidity' => $this->eventValidity,
            'eventValidityLabel' => $this->eventValidityLabel,

            'damageAmountOrder' => (int)$this->damageAmountOrder,
            'damageAmountOrderLabel' => $this->damageAmountOrderLabel,
            'damageMillionsDollars' => $this->damageMillionsDollars,
   

            'housesDestroyed' => $this->housesDestroyed,
            'housesDestroyedAmountOrder' => (int)$this->housesDestroyedAmountOrder,
            'housesDestroyedAmountOrderLabel' => $this->housesDestroyedAmountOrderLabel,

            'housesDamaged' => $this->housesDamaged,
            'housesDamagedAmountOrder' => (int)$this->housesDamagedAmountOrder,
            'housesDamagedAmountOrderLabel' => $this->housesDamagedAmountOrderLabel,

            'injuries' => $this->injuries,
            'injuriesAmountOrder' => (int)$this->injuriesAmountOrder,
            'injuriesAmountOrderLabel' => $this->injuriesAmountOrderLabel,

            'missing' => $this->missing,
            'missingAmountOrder' => (int)$this->missingAmountOrder,
            'missingAmountOrderLabel' => $this->missingAmountOrderLabel,

            'deaths' => $this->deaths,
            'deathsAmountOrder' => (int)$this->deathsAmountOrder,
            'deathsAmountOrderLabel' => $this->deathsAmountOrderLabel,

            'comments' => $this->comments,

            'earthquakeEventId' => $this->earthquakeEventId,
            'volcanoLocationId' => $this->volcanoLocationId,
            'volcanoEventId' => $this->volcanoEventId,


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
