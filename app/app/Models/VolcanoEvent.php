<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VolcanoEvent extends Model
{
    public function volcano()
    {
        return $this->belongsTo('App\Models\Volcano', 'volcanoLocationId');
    }
}
