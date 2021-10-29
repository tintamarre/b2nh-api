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
                    'url' => URL::current(),
                    'emoji' => '🌏🌊🌋'
                ],
                [
                    'title' => 'volcanoes',
                    'emoji' => '🌋',
                    'url' => route('api.volcanoes.index'),
                ],
                [
                    'title' => 'volcano_events',
                    'emoji' => '🌋',
                    'url' => route('api.volcano_events.index'),
                ],
                [
                    'title' => 'tsunami_events',
                    'emoji' => '🌊',
                    'url' => route('api.tsunami_events.index'),
                ],
                [
                    'title' => 'earthquake_events',
                    'emoji' => '🌏',
                    'url' => route('api.earthquake_events.index'),
                ],
                [
                    'title' => 'custom_methods',
                    'emoji' => '🛶',
                    'methods' => [
                        'volcanoes_map' => [
                            'title' => 'volcano_map',
                            'url' => route('api.volcanoes.map'),
                        ],
                        'volcanoes_elevation' => [
                            'title' => 'volcano_map',
                            'url' => route('api.volcanoes.elevation'),
                        ],
                    ]
                ]
            ],
            ];
    }
}
