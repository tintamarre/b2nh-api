<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\VolcanoEvent;
use App\Http\Resources\VolcanoEventResource;

class VolcanoEventController extends Controller
{

     /**
    * @OA\Get(
    * path="/volcano_events/",
    * summary="Get Volcano events informations",
    * description="Get Volcano events paginated",
    * operationId="getVolcanoEventsInfo",
    * tags={"Eruption"},
    * @OA\Response(
    *    response=200,
    *    description="Success"
    * )
    * )
    */

    public function index()
    {
        return VolcanoEventResource::collection(VolcanoEvent::paginate(10));
    }

    /**
    * @OA\Get(
    * path="/volcano_events/{volcano_event_id}",
    * summary="Get Volcano event information",
    * description="Get Volcano Event",
    * operationId="getVolcanoEventInfo",
    * @OA\Parameter(
    *          name="volcano_event_id",
    *          description="ID of the event volcano",
    *          required=true,
    *          in="path",
    *          example="6804",
    *          @OA\Schema(
    *              type="string"
    *          )
    *      ),
    * tags={"Eruption"},
    * @OA\Response(
    *    response=200,
    *    description="Success"
    * )
    * )
    */

    public function show($volcano_event_id)
    {
        return new VolcanoEventResource(VolcanoEvent::with(['volcano', 'tsunami_event','earthquake_event'])->find($volcano_event_id));
    }
}
