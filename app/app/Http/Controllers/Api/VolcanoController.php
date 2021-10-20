<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Volcano;
use App\Http\Resources\VolcanoResource;

class VolcanoController extends Controller
{
    public function index()
    {
        $volcanoes = Volcano::with([
            'volcano_events',
            'tsunami_events',
            'earthquake_events'
        ])->get();
        
        // return $volcanoes;
        return VolcanoResource::collection($volcanoes);
    }

    public function show($volcano_id)
    {
        return Volcano::with([
            'volcano_events',
            'tsunami_events',
            'earthquake_events'
        ])->find($volcano_id);
    }
}
