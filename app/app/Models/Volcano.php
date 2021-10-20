<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Volcano extends Model
{
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
}
