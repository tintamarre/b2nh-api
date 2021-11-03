<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\VolcanoEvent;
use App\Models\EarthquakeEvent;
use App\Models\TsunamiEvent;

use App\Http\Resources\VolcanoEventResource;
use App\Http\Resources\EarthquakeEventResource;
use App\Http\Resources\TsunamiEventResource;

class EventController extends Controller
{
    /**
    * @OA\Get(
    * path="/events/random",
    * summary="Get events count informations",
    * description="Get events count per year",
    * operationId="getEventsCountPerYear",
    * tags={"events"},
    * @OA\Response(
    *    response=200,
    *    description="Success"
    * )
    * )
    */
    public function random()
    {
        $types = ['volcano', 'earthquake', 'tsunami'];

        $type = $types[array_rand($types)];

        switch ($type) {
            case 'volcano':
                $event_id = VolcanoEvent::inRandomOrder()->first()->id;
                break;
            case 'earthquake':
                $event_id = EarthquakeEvent::inRandomOrder()->first()->id;
                break;
            case 'tsunami':
                $event_id = TsunamiEvent::inRandomOrder()->first()->id;
                break;
            default:
                return response()->json(['error' => 'Invalid event type'], 400);
        }

        return $this->show($type, $event_id);
    }

    /**
    * @OA\Get(
    * path="/events/{type}/{id}",
    * summary="Get events count informations",
    * description="Get events count per year",
    * operationId="getEventsCountPerYear",
    * tags={"events"},
    * @OA\Response(
    *    response=200,
    *    description="Success"
    * )
    * )
    */


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
    public function show($type, $event_id)
    {
        switch ($type) {
            case 'volcano':

                return new VolcanoEventResource(VolcanoEvent::with(['volcano', 'tsunami_event','earthquake_event'])->find($event_id));

                break;

            case 'earthquake':
                
                return new EarthquakeEventResource(EarthquakeEvent::with(['volcano_event','tsunami_event'])->find($event_id));

                break;

            case 'tsunami':
                 
                return new TsunamiEventResource(TsunamiEvent::with(['volcano',
                'volcano_event','earthquake_event'])->find($event_id));
                break;

            default:
                return response()->json(['error' => 'Invalid event type'], 400);
        }
    }

    /**
    * @OA\Get(
    * path="/events/count_per_year",
    * summary="Get events count informations",
    * description="Get events count per year",
    * operationId="getEventsCountPerYear",
    * tags={"events"},
    * @OA\Response(
    *    response=200,
    *    description="Success"
    * )
    * )
    */

    public function count_per_years()
    {
        $prout = DB::statement("
        CREATE VIEW
        volcanoes_count_per_years (min_year, max_year, count_volcano_events) as
        SELECT
          min(year),
          max(year),
          count(*) as range_count
        FROM
          volcano_events
        WHERE
          year > 1500
        GROUP BY          
            year / 20
        ");

        return response()->json([
            'data' => $prout
        ]);
    }
}
