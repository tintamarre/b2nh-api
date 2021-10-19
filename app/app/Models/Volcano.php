<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Volcano extends Model
{
    public function volcano_events()
    {
        return $this->hasMany('App\Models\VolcanoEvent', "volcanoLocationId");
    }

    public function earthquake_events()
    {
        return $this->hasMany('App\Models\EarthquakeEvent', "volcanoLocationId");
    }

    public function tsunami_events()
    {
        return $this->hasMany('App\Models\TsunamiEvent', "volcanoLocationId");
    }
}
