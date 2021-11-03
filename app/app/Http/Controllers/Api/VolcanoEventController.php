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
}
