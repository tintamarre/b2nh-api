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
        return $this->hasMany('App\Models\VolcanoEvent', "volcanoLocationId");
    }

    public function tsunami_events()
    {
        return $this->hasMany('App\Models\TsunamiEvent', "volcanoLocationId");
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
