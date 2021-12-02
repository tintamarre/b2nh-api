<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Volcano;
use App\Models\VolcanoEvent;
use App\Models\TsunamiEvent;
use App\Models\EarthquakeEvent;

use App\Http\Resources\VolcanoResource;
use App\Http\Resources\VolcanoesResource;
use App\Http\Resources\GeoJsonResource;
use App\Http\Resources\MapResource;

use DB;

class MapController extends Controller
{

    /**
* @OA\Get(
* path="/volcanoes_map/",
* summary="Get Volcanoes geographic informations",
* description="Get Volcanoes lat/long as GeoJson",
* operationId="getVolcanoInfo",
* tags={"Volcano"},
* @OA\Response(
* response=200,
* description="Success"
* )
* )
*/

    public function map()
    {
        $volcanoes = Volcano::all();

        // $features = $volcanoes->pluck('geojson')->toArray();

        return response()->json([
                '_meta' => [
                    'count_volcanoes' => $volcanoes->count(),
                ],
                "type" => "FeatureCollection",
                "features" => GeoJsonResource::collection($volcanoes)
                ]);
    }

    /**
* @OA\Get(
* path="/filter_map/start/{start_year}/end/{end_year}",
* summary="Get events between start and end year in GeoJSON",
* operationId="getEventsGeojson",
* tags={"Map"},
* @OA\Response(
* response=200,
* description="Success"
* ),
* @OA\Parameter(
* name="start_year",
* in="path",
* description="Start year",
* required=true,
* example="-5000",
* @OA\Schema(
* type="string"
* )
* ),
* @OA\Parameter(
* name="end_year",
* in="path",
* description="End year",
* required=true,
* example="2021",
* @OA\Schema(
* type="string"
* )
* )
* )
*/

    public function filter_map($start_year, $end_year)
    {
        $all_events = $this->get_events_collection($start_year, $end_year);

        return response()->json([
            '_meta' => [
                'count_all' => $all_events->count(),
            ],
            "type" => "FeatureCollection",
            "features" => GeoJsonResource::collection($all_events)
            ]);
    }

    /**
* @OA\Get(
* path="/filter_map_array/start/{start_year}/end/{end_year}",
* summary="Get events between start and end year in Array",
* operationId="getEventsAsArray",
* tags={"Map"},
* @OA\Response(
* response=200,
* description="Success"
* ),
* @OA\Parameter(
* name="start_year",
* in="path",
* description="Start year",
* required=true,
* example="-5000",
* @OA\Schema(
* type="string"
* )
* ),
* @OA\Parameter(
* name="end_year",
* in="path",
* description="End year",
* required=true,
* example="2021",
* @OA\Schema(
* type="string"
* )
* )
* )
*/



    public function filter_map_array($start_year, $end_year)
    {
        $all_events = $this->get_events_collection($start_year, $end_year);
   
        return MapResource::collection($all_events);
    }


    private function get_events_collection($start_year, $end_year)
    {
        $all_events = collect([]);

        $volcano_events = VolcanoEvent::whereBetween('year', [$start_year, $end_year])
        ->whereNotNull('latitude')
        ->whereNotNull('longitude')
        // ->whereNotNull('comments')
        ->whereNotNull('vei')
        // ->addSelect('MAX(vei) as vei')
        // ->where('vei', '>=', 3)
        ->select(DB::raw('MAX(vei) as vei'), 'year', 'latitude', 'longitude', 'comments', 'year', 'VolcanoLocationId')
        ->groupBy('VolcanoLocationId')
        ->get();
        
        $tsunami_events = TsunamiEvent::whereBetween('year', [$start_year, $end_year])
        ->whereNotNull('latitude')
        ->whereNotNull('longitude')
        // ->whereNotNull('comments')
        ->whereNotNull('maxWaterHeight')
        ->where('maxWaterHeight', '>=', 7)
        ->get();

        $earthquake_events = EarthquakeEvent::whereBetween('year', [$start_year, $end_year])
        ->whereNotNull('latitude')
        ->whereNotNull('longitude')
        // ->whereNotNull('comments')
        ->whereNotNull('eqMagnitude')
        ->where('eqMagnitude', '>=', 8.2)
        ->get();

        return $all_events->concat($volcano_events)->concat($earthquake_events)->concat($tsunami_events);
    }
}
