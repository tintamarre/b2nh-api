<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Volcano;
use App\Http\Resources\VolcanoResource;
use App\Http\Resources\VolcanoesResource;
use App\Http\Resources\GeoJsonResource;

class VolcanoController extends Controller
{

    /**
    * @OA\Get(
    * path="/volcanoes/",
    * summary="Get Volcanoes informations",
    * description="Get Volcanoes paginated",
    * operationId="getVolcanoesInfo",
    * tags={"Volcano"},
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
        ])->paginate(10);
        
        return VolcanoesResource::collection($volcanoes);
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
    * tags={"Volcano"},
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

    
    /**
    * @OA\Get(
    * path="/volcanoes_elevation/",
    * summary="Get Volcanoes elevations",
    * description="Get Volcanoes elevations",
    * operationId="getVolcanoInfo",
    * tags={"Volcano"},
    * @OA\Response(
    *    response=200,
    *    description="Success"
    * )
    * )
    */
    public function elevation()
    {
        $volcanoes_elevation = Volcano::whereNotNull('elevation')->orderBy('elevation')->pluck('elevation');

        // Force output value to be (int)
        foreach ($volcanoes_elevation as $key => $elevation) {
            $volcanoes_elevationArr[$key] = (int)$elevation;
        }

        return response()->json([
            'data' => $volcanoes_elevationArr
        ]);
    }
}
