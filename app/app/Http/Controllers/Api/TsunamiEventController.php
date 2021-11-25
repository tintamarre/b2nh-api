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
    * tags={"Events"},
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
}
