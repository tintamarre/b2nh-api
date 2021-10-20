<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EarthquakeEvent;

class EarthquakeEventController extends Controller
{
    public function index()
    {
        return EarthquakeEvent::get();
    }

    public function show($earthquake_id)
    {
        return EarthquakeEvent::find($earthquake_id);
    }
}
