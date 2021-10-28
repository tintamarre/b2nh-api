<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Volcano;
use App\Http\Resources\VolcanoResource;
use App\Http\Resources\VolcanoesResource;
use App\Http\Resources\VolcanoMapResource;
use App\Http\Resources\VolcanoElevationResource;

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
    * path="/volcanoes/{volcano_id}/image",
    * summary="Get an image (url) the volcano or a default one",
    * description="Get Volcano Image",
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

    public function getImage($volcano_id)
    {
        $volcano = Volcano::find($volcano_id);
        return $volcano->ExternalImageUrl;
    }


    /**
    * @OA\Get(
    * path="/volcanoes_map/",
    * summary="Get Volcanoes geographic informations",
    * description="Get Volcanoes lat/long",
    * operationId="getVolcanoInfo",
    * tags={"Volcano"},
    * @OA\Response(
    *    response=200,
    *    description="Success"
    * )
    * )
    */

    public function map()
    {
        $volcanoes = Volcano::all();
        
        return VolcanoMapResource::collection($volcanoes);
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
        $volcanoes = Volcano::whereNotNull('elevation')->orderBy('elevation')->get();
        return VolcanoElevationResource::collection($volcanoes);
    }
}
