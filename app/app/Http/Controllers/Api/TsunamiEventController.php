<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TsunamiEvent;

class TsunamiEventController extends Controller
{
    public function index()
    {
        return TsunamiEvent::get();
    }

    public function show($tsunami_id)
    {
        return TsunamiEvent::find($tsunami_id);
    }
}
