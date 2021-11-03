<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EarthquakeEvent;
use App\Http\Resources\EarthquakeEventResource;

class EarthquakeEventController extends Controller
{

    /**
    * @OA\Get(
    * path="/earthquake_events/",
    * summary="Get Earthquake events informations",
    * description="Get Earthquake events paginated",
    * operationId="getEarthquakeEventsInfo",
    * tags={"Earthquake"},
    * @OA\Response(
    *    response=200,
    *    description="Success"
    * )
    * )
    */

    public function index()
    {
        return EarthquakeEventResource::collection(EarthquakeEvent::paginate(10));
    }
}
