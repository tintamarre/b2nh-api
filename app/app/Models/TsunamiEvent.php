<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TsunamiEvent extends Model
{
    public function volcano()
    {
        return $this->belongsTo('App\Models\Volcano', 'volcanoLocationId');
    }
        
    public function volcano_event()
    {
        return $this->belongsTo('App\Models\VolcanoEvent', 'volcanoEventId');
    }
}
