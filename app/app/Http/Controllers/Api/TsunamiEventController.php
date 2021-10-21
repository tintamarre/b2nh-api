<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TsunamiEvent;
use App\Http\Resources\TsunamiEventResource;

class TsunamiEventController extends Controller
{

       /**
    * @OA\Get(
    * path="/tsunami_events/",
    * summary="Get Tsunami events informations",
    * description="Get Tsunami events paginated",
    * operationId="getTsunamiEventsInfo",
    * tags={"Tsunami"},
    * @OA\Response(
    *    response=200,
    *    description="Success"
    * )
    * )
    */

    public function index()
    {
        return TsunamiEventResource::collection(TsunamiEvent::paginate(10));
    }

    /**
        * @OA\Get(
        * path="/tsunami_events/{tsunami_event_id}",
        * summary="Get Tsunami Event information",
        * description="Get Tsunami event",
        * operationId="getTsunamiEventInfo",
        * @OA\Parameter(
        *          name="tsunami_event_id",
        *          description="ID of the event tsunami",
        *          required=true,
        *          in="path",
        *          example="8",
        *          @OA\Schema(
        *              type="string"
        *          )
        *      ),
        * tags={"Tsunami"},
        * @OA\Response(
        *    response=200,
        *    description="Success"
        * )
        * )
        */

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
