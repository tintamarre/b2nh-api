<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cache;
use App\Models\BaseModel;

class Volcano extends BaseModel
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
        $key = class_basename($this) . '_' . $this->id;

        return Cache::remember($key, 3600, function () {
            $url = "https://pixabay.com/api/?key=" . env('PIXABAY_API') . "&q=" . urlencode($this->name)  . "&image_type=photo";
            $content = @file_get_contents($url);
            if ($content === false) {
                Cache::forget($key);
                return 'error';
            } else {
                $result = json_decode($content);

                if (!empty($result->hits)) {
                    return $result->hits[0]->webformatURL;
                } else {
                    $default_images = [
                        "https://cdn.i-scmp.com/sites/default/files/d8/images/methode/2019/12/12/2fa2638e-1ca7-11ea-8971-922fdc94075f_image_hires_174609.JPG",
                        "https://volcanodiscovery.de/uploads/tx_tplink/sakurajima_j02376m.jpg",
                        "https://volcanodiscovery.de/fileadmin/photos/user/FrancescoTomarchio/tom2.jpg"
                    ];
                    
                    shuffle($default_images);
         
                    return $default_images[0];
                }
            }
        });
    }
}
