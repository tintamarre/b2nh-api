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



    public function getDateTimeDiffForHumansAttribute()
    {
        $dateTime = $this->createDateTime();

        return $dateTime->diffForHumans(['parts' => 2]);
    }

    public function getGeoJsonAttribute()
    {
        if (!$this->latitude or !$this->longitude) {
            return null;
        } else {
            return json_encode([
                'type' => 'Feature',
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [
                        (float)$this->longitude,
                        (float)$this->latitude
                    ],
                    'properties' => [
                        'title' => $this->name ?: '',
                        'type' => $this->class_basename,
                        'description' => $this->class_basename,
                        'marker-color' => '#ff0000',
                        'marker-symbol' => 'circle',
                        'marker-size' => 'medium'
                    ]
                ],
            ]);
        }
    }
}
