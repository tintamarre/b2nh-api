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
            'tsunami_events'
        ])->get();
        
        return VolcanoResource::collection($volcanoes);
    }

    public function show($volcano_id)
    {
        $volcano = Volcano::find($volcano_id);
        $volcano->load([
            'volcano_events',
            'tsunami_events'
        ]);

        return new VolcanoResource($volcano);
    }
}
