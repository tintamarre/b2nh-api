<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EarthquakeEvent;
use App\Http\Resources\EarthquakeEventResource;

class EarthquakeEventController extends Controller
{
    public function index()
    {
        return EarthquakeEventResource::collection(EarthquakeEvent::paginate(50));
    }

    public function show($earthquake_event_id)
    {
        return new EarthquakeEventResource(EarthquakeEvent::with(['volcano_event','tsunami_event'])->find($earthquake_event_id));
    }
}
