<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EarthquakeEvent extends Model
{
    // BELONGS TO

    public function volcano_event()
    {
        return $this->belongsTo('App\Models\VolcanoEvent', 'volcanoEventId');
    }

    public function tsunami_event()
    {
        return $this->belongsTo('App\Models\TsunamiEvent', 'tsunamiEventId');
    }

    // HAS MANY
    public function volcano_events()
    {
        return $this->hasMany('App\Models\VolcanoEvent', 'volcanoEventId');
    }

    public function tsunami_events()
    {
        return $this->hasMany('App\Models\TsunamiEvent', 'tsunamiEventId');
    }
}
