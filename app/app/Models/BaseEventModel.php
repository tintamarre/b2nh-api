<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Helper;
use App\Models\BaseModel;
use Carbon\Carbon;

class BaseEventModel extends BaseModel
{
    public function getLabelFromHelper($key)
    {
        $helper = Helper::where('key', $key)->first();
        if (!$helper) {
            return null;
        }
        return $helper->description;
    }

    public function getExternalMapUrlAttribute()
    {
        return "https://www.google.com/maps/place/".$this->latitude.",".$this->longitude;
    }


    private function createDateTime()
    {
        $tz = 'UTC';
        $dateTime = Carbon::create($this->year, $this->month, $this->day, $this->hour, $this->minute, $this->second, $tz);

        return $dateTime;
    }

    public function getDateTimeAttribute()
    {
        $dateTime = $this->createDateTime();

        return $dateTime;
    }


    public function getCustomTitleAttribute()
    {
        $title = "";

        if ($this->type == "eruption") {
            $title = $title . ' ' . $this->volcano->name;
        }

        $title = $title . ' ' . $this->locationName;

        return trim($title);
    }


    public function getSelfUrlAttribute()
    {
        return route('api.events.show', ['type' => $this->type, 'event_id' => $this->id]);
    }


    public function getDateTimeDiffForHumansAttribute()
    {
        $dateTime = $this->createDateTime();

        return $dateTime->diffForHumans(['parts' => 2]);
    }

    public function getGeoJsonAttribute()
    {
        return json_encode([
                'type' => 'Feature',
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [
                        (float)$this->longitude,
                        (float)$this->latitude
                    ],
                ],
                'properties' => [
                    'title' => $this->custom_title,
                    'type' => $this->class_basename,
                    'dateTime' => $this->dateTime->toCookieString(),
                    'dateTimeForHumans' => $this->dateTimeDiffForHumans ?: "",
                    'measure_value' => $this->measure_value,
                    'measure_type' => $this->measure_type,
                    'self_url' => $this->selfUrl
                ]
            ]);
    }
}
