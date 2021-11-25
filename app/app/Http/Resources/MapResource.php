<?php

namespace App\Http\Resources;

class MapResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,

            // 'id' => $this->id + '_' + $this->type,
            'title' => (string)$this->custom_title,
            'type' => (string)$this->type,
            'latitude' => (float)$this->latitude,
            'longitude' => (float)$this->longitude,
            'measure_value' => $this->measure_value,
            'measure_type' => $this->measure_type,
            'year' => $this->year,
            'dateTime' => $this->dateTime,
            'dateTimeForHumans' => $this->dateTimeDiffForHumans ?: "",
            'self_url' => $this->self_url,
        ];
    }
}
