<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\VolcanoEvent;
use App\Http\Resources\VolcanoEventResource;

class VolcanoEventController extends Controller
{
    public function index()
    {
        return VolcanoEventResource::collection(VolcanoEvent::paginate(10));
    }

    public function show($volcano_event_id)
    {
        return new VolcanoEventResource(VolcanoEvent::with(['volcano', 'tsunami_event','earthquake_event'])->find($volcano_event_id));
    }
}
