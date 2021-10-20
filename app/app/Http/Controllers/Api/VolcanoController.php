<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Volcano;
use App\Http\Resources\VolcanoResource;

class VolcanoController extends Controller
{

    /**
    * @OA\Get(
    * path="/volcanoes/",
    * summary="Get Volcanoes informations",
    * description="Get Volcanoes paginated",
    * operationId="getVolcanoesInfo",
    * tags={"volcano"},
    * @OA\Response(
    *    response=200,
    *    description="Success"
    * )
    * )
    */

    public function index()
    {
        $volcanoes = Volcano::with([
            'volcano_events',
            'tsunami_events'
        ])->paginate(50);
        
        return VolcanoResource::collection($volcanoes);
    }

    /**
    * @OA\Get(
    * path="/volcanoes/{volcano_id}",
    * summary="Get Volcano information",
    * description="Get Volcano",
    * operationId="getVolcanoInfo",
    * @OA\Parameter(
    *          name="volcano_id",
    *          description="ID of the volcano",
    *          required=true,
    *          in="path",
    *          example="10102",
    *          @OA\Schema(
    *              type="string"
    *          )
    *      ),
    * tags={"volcano"},
    * @OA\Response(
    *    response=200,
    *    description="Success"
    * )
    * )
    */
 
    public function show($volcano_id)
    {
        $volcano = Volcano::find($volcano_id);
        $volcano->load([
            'volcano_events',
            'tsunami_events'
        ]);

        return new VolcanoResource($volcano);
    }
}
