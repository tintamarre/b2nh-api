<?php

namespace App\Http\Resources;

use URL;

class HomePageResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'title' => env('APP_NAME'),
      
            'navigation_menu' => [
                [
                    'title' => 'self',
                    'url' => URL::current()
                ],
                [
                    'title' => 'volcanoes',
                    'url' => route('api.volcanoes.index'),
                ],
                [
                    'title' => 'volcano_events',
                    'url' => route('api.volcano_events.index'),
                ],
                [
                    'title' => 'tsunami_events',
                    'url' => route('api.tsunami_events.index'),
                ],
                [
                    'title' => 'earthquake_events',
                    'url' => route('api.earthquake_events.index'),
                ]
            ],
            ];
    }
}
