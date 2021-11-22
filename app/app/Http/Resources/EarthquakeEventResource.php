<?php

namespace App\Http\Resources;

class EarthquakeEventResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id' => (int)$this->id,

            'type' => (string)$this->type,
            'emoji' => "🌏",

            'class_basename' => $this->class_basename,

            'year' => (int)$this->year,
            'month' => (int)$this->month,
            'day' => (int)$this->day,

            'hour' => (int)$this->hour,
            'minute' => (int)$this->minute,
            'second' => (int)$this->second,

            'longitude' => (float)$this->longitude,
            'latitude' => (float)$this->latitude,

            'locationName' => $this->locationName,
            'country' => $this->country,

            'dateTime' => $this->dateTime->toCookieString(),
            'dateTimeDiffForHumans' => $this->dateTimeDiffForHumans,

            'geoJson' => json_decode($this->geoJson),

            'area' => $this->area,

            'regionCode' => (int)$this->regionCode,
            'regionCodeLabel' => $this->regionCodeLabel,

            'eqMagnitude' => (float)$this->eqMagnitude,
            'eqDepth' => (float)$this->eqDepth,
            'eqMagUnk' => (float)$this->eqMagUnk,

            'intensity' => (int)$this->intensity,
            'intensityLabel' => $this->intensityLabel,

            'damageAmountOrder' => (int)$this->damageAmountOrder,
            'damageAmountOrderLabel' => $this->damageAmountOrderLabel,
            'damageMillionsDollars' => (int)$this->damageMillionsDollars,


            'housesDestroyed' => (int)$this->housesDestroyed,
            'housesDestroyedAmountOrder' => (int)$this->housesDestroyedAmountOrder,
            'housesDestroyedAmountOrderLabel' => $this->housesDestroyedAmountOrderLabel,
            'housesDestroyedTotal' => (int)$this->housesDestroyedTotal,
           
            'housesDamaged' => (int)$this->housesDamaged,
            'housesDamagedAmountOrder' => (int)$this->housesDamagedAmountOrder,
            'housesDamagedAmountOrderLabel' => $this->housesDamagedAmountOrderLabel,
            'housesDamagedTotal' => $this->housesDamagedTotal,

            'injuries' => (int)$this->injuries,
            'injuriesAmountOrder' => (int)$this->injuriesAmountOrder,
            'injuriesAmountOrderLabel' => $this->injuriesAmountOrderLabel,
            'injuriesTotal' => (int)$this->injuriesTotal,

            'missing' => (int)$this->missing,
            'missingAmountOrder' => (int)$this->missingAmountOrder,
            'missingAmountOrderLabel' => $this->missingAmountOrderLabel,
            'missingTotal' => (int)$this->missingTotal,

            'deaths' => (int)$this->deaths,
            'deathsAmountOrder' => (int)$this->deathsAmountOrder,
            'deathsAmountOrderLabel' => $this->deathsAmountOrderLabel,

            'comments' => $this->comments,

            'tsunamiEventId' => (int)$this->tsunamiEventId,
            'volcanoEventId' => (int)$this->volcanoEventId,

            'tsunami_event' => new TsunamiEventResource($this->whenLoaded('tsunami_event')),
            'volcano_event' => new VolcanoEventResource($this->whenLoaded('volcano_event')),

            'tsunami_events' => TsunamiEventResource::collection($this->whenLoaded('tsunami_events')),
            'volcano_events' => VolcanoEventResource::collection($this->whenLoaded('volcano_events')),

            'external' => [
                'external_map_url' => $this->external_map_url,
                'external_image' => route('api.images.getUrl', ['category' => 'earthquake', 'item' => urlencode($this->locationName)]),
            ],

            'links' => [
                            'self' => route('api.events.show', [
                                'type' => 'earthquake',
                                'event_id' => $this->id
                            ]),
                ]

        ];
    }
}
