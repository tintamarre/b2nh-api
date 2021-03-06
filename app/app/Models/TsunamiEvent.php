<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TsunamiEvent extends BaseEventModel
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
        return $this->hasMany('App\Models\VolcanoEvent', 'volcanoEventId')   
        ->orderBy('year', 'desc')
        ->orderBy('month', 'desc')
        ->orderBy('day', 'desc');
    }

    public function earthquake_events()
    {
        return $this->hasMany('App\Models\EarthquakeEvent', 'earthquakeEventId')   
        ->orderBy('year', 'desc')
        ->orderBy('month', 'desc')
        ->orderBy('day', 'desc');
    }

    // Helper Attribute
    public function getTypeAttribute()
    {
        return 'tsunami';
    }

    public function getMeasureTypeAttribute()
    {
        return 'Tsunami intensity';
    }

    public function getMeasureValueAttribute()
    {
        return $this->tis;
    }

    public function getTisAttribute()
    {
        if ($this->maxWaterHeight) {
            return round((0.5 + log($this->maxWaterHeight, 2)), 2);
        }

        return null;
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
        $key = 'tsunamis_regions' . '_'. $this->regionCode;

        return $this->getLabelFromHelper($key);
    }

    public function getCauseCodeLabelAttribute()
    {
        $key = 'tsunamis_causes' .'_'. $this->causeCode;

        return $this->getLabelFromHelper($key);
    }

    public function getEventValidityLabelAttribute()
    {
        $key = 'tsunamis_validity' .'_'. $this->eventValidity;

        return $this->getLabelFromHelper($key);
    }
}
