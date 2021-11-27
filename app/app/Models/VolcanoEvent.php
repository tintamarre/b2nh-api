<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    // Helper Attribute


    public function getTypeAttribute()
    {
        return 'eruption';
    }

    public function getMeasureTypeAttribute()
    {
        return 'vei';
    }

    public function getMeasureValueAttribute()
    {
        return $this->vei;
    }

    public function getCustomTitleAttribute()
    {
        return $this->volcano->name;
    }

    public function getLatitudeAttribute()
    {
        return $this->volcano->latitude;
    }

    public function getLongitudeAttribute()
    {
        return $this->volcano->longitude;
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

    public function getDurationAttribute()
    {
        if ($this->endDate) {
            return Carbon::createFromDate($this->endDate)->diffForHumans($this->startDate, Carbon::DIFF_ABSOLUTE);
        } else {
            return 'unknown';
        }
    }

    public function getVeiDetailsAttribute()
    {
        switch ($this->vei) {
            case 0:
                return [
                    'ejacta_volume' => "< 10^4 m3",
                    'classification' => "Hawaiian",
                    'description' => "Effusive",
                    'plume' => '< 100 m',
                    'frequency' => 'continuous',
                    'topospheric_injection' => 'negligible',
                    'stratospheric_injection' => 'none'
                ];
            case 1:
                return [
                    'ejacta_volume' => "> 10^4 m3",
                    'classification' => "Hawaiian / Strombolian",
                    'description' => "Gentle",
                    'plume' => '100 m - 1 km',
                    'frequency' => 'daily',
                    'topospheric_injection' => 'mino',
                    'stratospheric_injection' => 'none'
                ];
            case 2:
                return [
                    'ejacta_volume' => "> 10^6 m3",
                    'classification' => "Strombolian / Vulcanian",
                    'description' => "Explosive",
                    'plume' => '1 - 5 km',
                    'frequency' => 'every two weeks',
                    'topospheric_injection' => 'moderate',
                    'stratospheric_injection' => 'none'
                ];
            case 3:
                return [
                    'ejacta_volume' => "> 10^7 m3",
                    'classification' => "Vulcanian / Peléan / Sub-Plinian",
                    'description' => "Catastrophic",
                    'plume' => '3 - 15 km',
                    'frequency' => '3 months',
                    'topospheric_injection' => 'substantial',
                    'stratospheric_injection' => 'possible'
                ];
            case 4:
                return [
                    'ejacta_volume' => "> 0.1 km3",
                    'classification' => "Peléan / Plinain / Sub-Plinian",
                    'description' => "Cataclysmic",
                    'plume' => '> 10 km',
                    'frequency' => '18 months',
                    'topospheric_injection' => 'substantial',
                    'stratospheric_injection' => 'definite'
                ];
            case 5:
                return [
                    'ejacta_volume' => "> 1 km3",
                    'classification' => "Peléan / Plinain",
                    'description' => "Paroxysmic",
                    'plume' => '> 10 km',
                    'frequency' => '12 years',
                    'topospheric_injection' => 'substantial',
                    'stratospheric_injection' => 'significant'
                ];
            case 6:
                return [
                    'ejacta_volume' => "> 10 km3",
                    'classification' => "Plinain / Ultra-Plinain",
                    'description' => "Colossal",
                    'plume' => '> 20 km',
                    'frequency' => '50-100 years',
                    'topospheric_injection' => 'substantial',
                    'stratospheric_injection' => 'substantial'
                ];
            case 7:
                return [
                    'ejacta_volume' => "> 100 km3",
                    'classification' => "Ultra-Plinain",
                    'description' => "Super-colossal",
                    'plume' => '> 20 km',
                    'frequency' => '500-1000 years',
                    'topospheric_injection' => 'substantial',
                    'stratospheric_injection' => 'substantial'
                ];
            case 8:
                return [
                    'ejacta_volume' => "> 1000 km3",
                    'classification' => "Ultra-Plinain",
                    'description' => "Mega-colossal",
                    'plume' => '> 20 km',
                    'frequency' => '> 50000 years',
                    'topospheric_injection' => 'vast',
                    'stratospheric_injection' => 'vast'
                ];
            default:
            return 'Unknown';
        }
    }
}
