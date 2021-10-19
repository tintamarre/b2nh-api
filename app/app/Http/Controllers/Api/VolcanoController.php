<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Volcano;

class VolcanoController extends Controller
{
    public function index()
    {
        return Volcano::with([
            'volcano_events',
            'tsunami_events',
            'earthquake_events'
        ])->get();
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
