<?php

namespace App\Http\Resources;

class TsunamiEventResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id' => (int)$this->id,

            'emoji' => "🌊",
            'type' => (string)$this->type,
            'class_basename' => $this->class_basename,

            'year' => (int)$this->year,
            'month' => (int)$this-> month,
            'day' => (int)$this->day,
            'hour' => (int)$this->hour,
            'minute' => (int)$this->minute,
            'second' => (int)$this->second,

            'dateTime' => $this->dateTime->toCookieString(),
            'dateTimeDiffForHumans' => $this->dateTimeDiffForHumans,

            'locationName' => $this->locationName,

            'country' => $this->country,
            'area' => $this->area,

            'longitude' => (float)$this->longitude,
            'latitude' => (float)$this->latitude,

            // 'geoJson' => json_decode($this->geoJson),

            'maxWaterHeight' => (int)$this->maxWaterHeight,
            'tsMtAbe' => $this->tsMtAbe,

            'tis' => $this->tis,

            'regionCode' => (int)$this->regionCode,
            'regionCodeLabel' => $this->regionCodeLabel,

            'causeCode' => (int)$this->causeCode,
            'causeCodeLabel' => $this->causeCodeLabel,

            'eventValidity' => (int)$this->eventValidity,
            'eventValidityLabel' => $this->eventValidityLabel,

            'damageAmountOrder' => (int)$this->damageAmountOrder,
            'damageAmountOrderLabel' => $this->damageAmountOrderLabel,
            'damageMillionsDollars' => (int)$this->damageMillionsDollars,
   

            'housesDestroyed' => (int)$this->housesDestroyed,
            'housesDestroyedAmountOrder' => (int)$this->housesDestroyedAmountOrder,
            'housesDestroyedAmountOrderLabel' => $this->housesDestroyedAmountOrderLabel,

            'housesDamaged' => (int)$this->housesDamaged,
            'housesDamagedAmountOrder' => (int)$this->housesDamagedAmountOrder,
            'housesDamagedAmountOrderLabel' => $this->housesDamagedAmountOrderLabel,

            'injuries' => (int)$this->injuries,
            'injuriesAmountOrder' => (int)$this->injuriesAmountOrder,
            'injuriesAmountOrderLabel' => $this->injuriesAmountOrderLabel,

            'missing' => (int)$this->missing,
            'missingAmountOrder' => (int)$this->missingAmountOrder,
            'missingAmountOrderLabel' => $this->missingAmountOrderLabel,

            'deaths' => (int)$this->deaths,
            'deathsAmountOrder' => (int)$this->deathsAmountOrder,
            'deathsAmountOrderLabel' => $this->deathsAmountOrderLabel,

            'comments' => $this->comments,

            'earthquakeEventId' => (int)$this->earthquakeEventId,
            'volcanoLocationId' => (int)$this->volcanoLocationId,
            'volcanoEventId' => (int)$this->volcanoEventId,


            'earthquake_event' => new EarthquakeEventResource($this->whenLoaded('earthquake_event')),
            'volcano_event' => new VolcanoEventResource($this->whenLoaded('volcano_event')),
            'volcano' => new VolcanoResource($this->whenLoaded('volcano')),

            'volcano_events' => VolcanoEventResource::collection($this->whenLoaded('volcano_events')),
            'earthquake_events' => EarthquakeEventResource::collection($this->whenLoaded('earthquake_events')),
 
            'external' => [
                'external_map_url' => $this->external_map_url,
                'external_image' => route('api.images.getUrl', ['category' => 'tsunami', 'item' => urlencode($this->locationName)]),
            ],

            'links' => [
                'self' => route('api.events.show', [
                    'type' => 'tsunami',
                    'event_id' => $this->id
                ]),
                ]

        ];
    }
}
