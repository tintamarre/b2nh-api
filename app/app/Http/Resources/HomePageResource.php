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
                'volcanoes' => route('api.volcanoes.index'),
                'volcano_events' => route('api.volcano_events.index'),
                'tsunami_events' => route('api.tsunami_events.index'),
                'earthquake_events' => route('api.earthquake_events.index')
            ],
            ];
    }
}
