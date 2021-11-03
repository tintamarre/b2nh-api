<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\VolcanoEvent;
use App\Models\EarthquakeEvent;
use App\Models\TsunamiEvent;

use App\Http\Resources\VolcanoEventResource;
use App\Http\Resources\EarthquakeEventResource;
use App\Http\Resources\TsunamiEventResource;

class EventSiblingsController extends Controller
{
    public function nearest($type, $event_id, $count = 3)
    {
        $event = $this->getEvent($type, $event_id);
        return $event;
    }
    public function closest($type, $event_id, $count = 3)
    {
        $event = $this->getEvent($type, $event_id);
        return $event;
    }

    private function getEvent($type, $event_id)
    {
        switch ($type) {
            case 'volcano':

                return VolcanoEvent::with(['volcano', 'tsunami_event','earthquake_event'])->find($event_id);

                break;

            case 'earthquake':
                
                return EarthquakeEvent::with(['volcano_event','tsunami_event'])->find($event_id);

                break;

            case 'tsunami':
                 
                return TsunamiEvent::with(['volcano',
                'volcano_event','earthquake_event'])->find($event_id);
                break;

            default:
                return response()->json(['error' => 'Invalid event type'], 400);
        }
    }
}
