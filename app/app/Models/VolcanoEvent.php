<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VolcanoEvent extends Model
{
    // BELONGS TO
    public function volcano()
    {
        return $this->belongsTo('App\Models\Volcano', 'volcanoLocationId');
    }

    public function earthquake_event()
    {
        return $this->belongsTo('App\Models\EarthquakeEvent', 'earthquakeEventId');
    }

    public function tsunami_event()
    {
        return $this->belongsTo('App\Models\TsunamiEvent', 'tsunamiEventId');
    }

    // HAS MANY
    public function earthquake_events()
    {
        return $this->hasMany('App\Models\EarthquateEvent', "earthquakeEventId");
    }

    public function tsunami_events()
    {
        return $this->hasMany('App\Models\TsunamiEvent', 'tsunamiEventId');
    }
}
