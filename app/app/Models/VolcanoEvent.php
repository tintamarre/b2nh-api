<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VolcanoEvent extends BaseEventModel
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

    public function getDamageAmountOrderLabelAttribute()
    {
        $key = 'damage' .'_'. $this->damageAmountOrder;

        return $this->getLabelFromHelper($key);
    }
    
    public function getDeathsAmountOrderLabelAttribute()
    {
        $key = 'people' . '_'. $this->deathsAmountOrder;

        return $this->getLabelFromHelper($key);
    }

    public function getInjuriesAmountOrderLabelAttribute()
    {
        $key = 'people' .'_'. $this->injuriesAmountOrder;

        return $this->getLabelFromHelper($key);
    }
    public function getHousesDestroyedAmountOrderLabelAttribute()
    {
        $key = 'house' . '_'. $this->housesDestroyedAmountOrder;

        return $this->getLabelFromHelper($key);
    }

    public function getMissingAmountOrderLabelAttribute()
    {
        $key = 'people' .'_'. $this->missingAmountOrder;

        return $this->getLabelFromHelper($key);
    }
}
