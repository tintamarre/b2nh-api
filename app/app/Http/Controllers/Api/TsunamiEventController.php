<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TsunamiEvent;
use App\Http\Resources\TsunamiEventResource;

class TsunamiEventController extends Controller
{
    public function index()
    {
        return TsunamiEventResource::collection(TsunamiEvent::paginate(10));
    }

    public function show($tsunami_event_id)
    {
        $tsunami = TsunamiEvent::find($tsunami_event_id);
        $tsunami->load([
            'volcano',
            'volcano_event',
            'earthquake_event'
        ]);

        return new TsunamiEventResource($tsunami);
    }
}
