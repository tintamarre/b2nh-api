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

    /**
       * @OA\Get(
       * path="/earthquake_events/{earthquake_event_id}",
       * summary="Get Earthquake event information",
       * description="Get Earthquake Event",
       * operationId="getEarthquakeEventInfo",
       * @OA\Parameter(
       *          name="earthquake_event_id",
       *          description="ID of the event Earthquake",
       *          required=true,
       *          in="path",
       *          example="3",
       *          @OA\Schema(
       *              type="string"
       *          )
       *      ),
       * tags={"Earthquake"},
       * @OA\Response(
       *    response=200,
       *    description="Success"
       * )
       * )
       */

    public function show($earthquake_event_id)
    {
        return new EarthquakeEventResource(EarthquakeEvent::with(['volcano_event','earthquake_event'])->find($earthquake_event_id));
    }
}
