<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BaseResource extends JsonResource
{
    public function toArray($request)
    {
    }

    public function with($request)
    {
        return
        [
            'meta' => [
                'api_version' => 'v1',
                'author' => '❤️ ' . env('APP_NAME'),
                'disclaimer' => '⚠ What you are seeing is raw technical data formatted in a non human readable way. It is not meant to be user-friendly. To access a more user-friendy service, please visit ...',
            ],
        ];
    }
}
