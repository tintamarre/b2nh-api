<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EarthquakeEvent extends Model
{
    public function tsunami_event()
    {
        return $this->belongsTo('App\Models\Tsunami', 'tsunamiEventId');
    }
    
    public function volcano_event()
    {
        return $this->belongsTo('App\Models\VolcanoEvent', 'volcanoEventId');
    }
}
