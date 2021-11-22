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

    public function filter_map($start_year, $end_year)
    {
        $all_events = collect([]);

        $volcano_events = VolcanoEvent::whereBetween('year', [$start_year, $end_year])->whereNotNull('latitude')->whereNotNull('longitude')->get();
        $tsunami_events = TsunamiEvent::whereBetween('year', [$start_year, $end_year])->whereNotNull('latitude')->whereNotNull('longitude')->get();
        $earthquake_events = EarthquakeEvent::whereBetween('year', [$start_year, $end_year])->whereNotNull('latitude')->whereNotNull('longitude')->get();

        $all_events = $all_events->concat($volcano_events)->concat($earthquake_events)->concat($tsunami_events);

        return response()->json([
            '_meta' => [
                'count_all' => $all_events->count(),
                'count_volcano_events' => $volcano_events->count(),
                'count_tsunami_events' => $tsunami_events->count(),
                'count_earthquake_events' => $earthquake_events->count(),
            ],
            "type" => "FeatureCollection",
            "features" => GeoJsonResource::collection($all_events)
            ]);
    }
}
