<?php

namespace App\Http\Resources;

use URL;

class HomePageResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'title' => "",
            'links' => [
                'self' => URL::current(),
            ],
            ];
    }
}
