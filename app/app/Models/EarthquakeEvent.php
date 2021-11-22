<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EarthquakeEvent extends BaseEventModel
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


    // Helper Attribute
    public function getTypeAttribute()
    {
        return 'earthquake';
    }

    public function getMeasureTypeAttribute()
    {
        return 'eqMagnitude';
    }

    public function getMeasureValueAttribute()
    {
        return $this->eqMagnitude;
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

    public function getHousesDamagedAmountOrderLabelAttribute()
    {
        $key = 'house' .'_'. $this->housesDamagedAmountOrder;

        return $this->getLabelFromHelper($key);
    }

    public function getRegionCodeLabelAttribute()
    {
        $key = 'earthquakes_regions' . '_'. $this->regionCode;

        return $this->getLabelFromHelper($key);
    }

    public function getIntensityLabelAttribute()
    {
        $key = 'earthquakes_intensity' . '_'. $this->intensity;

        return $this->getLabelFromHelper($key);
    }
}
