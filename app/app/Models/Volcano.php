<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Volcano extends Model
{
    // HAS MANY

    public function volcano_events()
    {
        return $this->hasMany('App\Models\VolcanoEvent', "volcanoLocationId");
    }

    public function tsunami_events()
    {
        return $this->hasMany('App\Models\TsunamiEvent', "volcanoLocationId");
    }


 

    // Attributes
    public function getEventsCountAttribute()
    {
        return $this->volcano_events()->count() + $this->tsunami_events()->count();
    }


    public function getExternalMapUrlAttribute()
    {
        return "https://www.google.com/maps/place/".$this->latitude.",".$this->longitude;
    }

    public function getExternalWikipediaUrlAttribute()
    {
        return "https://en.wikipedia.org/wiki/" . str_replace(' ', '_', $this->name);
    }

    public function getExternalImageUrlAttribute()
    {
        return null;
        // Need to cache
        // $url = "https://pixabay.com/api/?key=" . env('PIXABAY_API') . "&q=" . urlencode($this->name)  . "&image_type=photo";
        // // SLOW
        // return json_decode(file_get_contents($url))->hits[0]->webformatURL;
    }
}
