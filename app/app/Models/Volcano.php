<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cache;
use App\Models\BaseModel;

class Volcano extends BaseModel
{
    // HAS MANY

    public function volcano_events()
    {
        return $this->hasMany('App\Models\VolcanoEvent', "volcanoLocationId")
        ->orderBy('year', 'desc')
        ->orderBy('month', 'desc')
        ->orderBy('day', 'desc');
    }

    public function tsunami_events()
    {
        return $this->hasMany('App\Models\TsunamiEvent', "volcanoLocationId")
        ->orderBy('year', 'desc')
        ->orderBy('month', 'desc')
        ->orderBy('day', 'desc');
    }

 
    // Attributes
    public function getEventsCountAttribute()
    {
        return $this->volcano_events()->count() + $this->tsunami_events()->count();
    }


    public function getExternalMapUrlAttribute()
    {
        return "https://www.google.com/maps/place/".$this->latitude.",".$this->longitude;
    }

    public function getExternalWikipediaUrlAttribute()
    {
        return "https://en.wikipedia.org/wiki/" . str_replace(' ', '_', $this->name);
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
                ],
                // 'LatLng' => 'LatLng(' . (float)$this->latitude . ',' . (float)$this->longitude . ')',
                'properties' => [
                    'title' => $this->name ?: '',
                    'type' => $this->class_basename,
                    'description' => $this->class_basename,
                    'self_url' => route('api.volcanoes.show', ['volcano_id' => $this->id]),
                ]
            ]);
        }
    }
}
