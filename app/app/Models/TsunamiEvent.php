<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TsunamiEvent extends Model
{
    // BELONGS TO
    public function volcano()
    {
        return $this->belongsTo('App\Models\Volcano', 'volcanoLocationId');
    }
        
    public function volcano_event()
    {
        return $this->belongsTo('App\Models\VolcanoEvent', 'volcanoEventId');
    }

    public function earthquake_event()
    {
        return $this->belongsTo('App\Models\EarthquakeEvent', 'earthquakeEventId');
    }

    // HAS MANY
    public function volcano_events()
    {
        return $this->hasMany('App\Models\VolcanoEvent', 'volcanoEventId');
    }

    public function earthquake_events()
    {
        return $this->hasMany('App\Models\EarthquakeEvent', 'earthquakeEventId');
    }
}
