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
                    'emoji' => '🌏🌊🌋',
                    'href' => URL::current(),
                ],
                [
                    'title' => 'volcanoes',
                    'emoji' => '🌋',
                    'href' => route('api.volcanoes.index'),
                ],
                [
                    'title' => 'volcano_events',
                    'emoji' => '🌋',
                    'href' => route('api.volcano_events.index'),
                ],
                [
                    'title' => 'tsunami_events',
                    'emoji' => '🌊',
                    'href' => route('api.tsunami_events.index'),
                ],
                [
                    'title' => 'earthquake_events',
                    'emoji' => '🌏',
                    'href' => route('api.earthquake_events.index'),
                ],
                [
                    'title' => 'custom_methods',
                    'emoji' => '🛶',
                    'methods' => [
                        'volcanoes_map' => [
                            'title' => 'volcano_map',
                            'href' => route('api.volcanoes.map'),
                        ],
                        'volcanoes_elevation' => [
                            'title' => 'volcano_map',
                            'href' => route('api.volcanoes.elevation'),
                        ],
                        'events_by_type' => [
                            'title' => 'events_by_type',
                            'href' => null,
                        ],
                        'events_by_damage' => [
                            'title' => 'events_by_damage',
                            'href' => null,
                        ],
                        'events_by_deaths' => [
                            'title' => 'events_by_deaths',
                            'href' => null,
                        ],
                    ]
                ]
            ],
            ];
    }
}
