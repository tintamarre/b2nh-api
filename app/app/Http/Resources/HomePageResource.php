<?php

namespace App\Http\Resources;

use URL;

class HomePageResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'title' => env('APP_NAME'),
      
            'links' => [
                'self' => URL::current(),
                'explore_volcanoes' => route('api.volcanoes.index'),
                'explore_volcano_events' => 'nope',
                'explore_tsunami_events' => route('api.tsunamis.index'),
                'explore_earthquake_events' => route('api.earthquakes.index')
            ],
            ];
    }
}
