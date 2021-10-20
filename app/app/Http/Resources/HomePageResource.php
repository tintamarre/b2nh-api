<?php

namespace App\Http\Resources;

use URL;

class HomePageResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'title' => env('APP_NAME'),
            'routes' => [
                'explore_volcanoes' => route('api.volcanoes.index'),
                'explore_tsunamis' => route('api.tsunamis.index'),
                'explore_earthquakes' => route('api.earthquakes.index')
            ],
            'links' => [
                'self' => URL::current(),
            ],
            ];
    }
}
