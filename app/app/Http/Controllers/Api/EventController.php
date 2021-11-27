<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\VolcanoEvent;
use App\Models\EarthquakeEvent;
use App\Models\TsunamiEvent;

use App\Http\Resources\VolcanoEventResource;
use App\Http\Resources\EarthquakeEventResource;
use App\Http\Resources\TsunamiEventResource;

use DB;

class EventController extends Controller
{
    /**
    * @OA\Get(
    * path="/events/random",
    * summary="Get a random event",
    * operationId="getRandomEvent",
    * tags={"Events"},
    * @OA\Response(
    *    response=200,
    *    description="Success"
    * )
    * )
    */
    public function random()
    {
        $types = ['eruption', 'earthquake', 'tsunami'];

        $type = $types[array_rand($types)];

        switch ($type) {
            case 'eruption':
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
    * summary="Get a specific event by type and id",
    * operationId="getEvent",
    * tags={"Events"},
    * @OA\Response(
    *    response=200,
    *    description="Success"
    * ),
    * @OA\Parameter(
    *     name="type",
    *     in="path",
    *     description="Event type",
    *     required=true,
    *     @OA\Schema(
    *         type="string",
    *         enum={"eruption", "earthquake", "tsunami"}
    *     )
    * ),
    * @OA\Parameter(
    *     name="id",
    *     in="path",
    *     description="Event id",
    *     required=true,
    *     @OA\Schema(
    *         type="integer"
    *     )
    * )
    * )
    */



    public function show($type, $event_id)
    {
        switch ($type) {
            case 'eruption':

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


    public function count_per_years()
    {
        $count_per_years = DB::table('volcano_events')
             ->select(DB::raw('min(year) as min_year,
             max(year) as max_year,
             count(*) as count'))
             ->where('year', '>', 1500)
             ->groupByRaw('year / 100')
             ->get();

        return response()->json([
            'data' => $count_per_years
        ]);
    }



    public function sunburst()
    {
        $volcano_events = DB::table('volcano_events')
                 ->select(DB::raw("'VEI' || ' ' || vei as name, count(id) as value"))
                 ->groupBy('name')
                 ->orderBy('vei', 'asc')
                 ->where('vei', '>=', 4)
                 ->get();

        $tsunami_events = DB::table('tsunami_events')
                 ->select(DB::raw("'tis' || ' ' || (round(maxWaterHeight / 100) + 5) as name, count(id) as value"))
                 ->groupBy('name')
                 ->orderBy('maxWaterHeight', 'asc')
                 ->where('maxWaterHeight', '>=', 7)
                 ->get();

                 
        $earthquake_events = DB::table('earthquake_events')
                 ->select(DB::raw("'EqMagni' || ' ' || round(eqMagnitude) as name, count(id) as value"))
                 ->groupBy('name')
                 ->orderBy('eqMagnitude', 'asc')
                 ->where('eqMagnitude', '>=', 8)
                 ->get();

    
  
    

        return response()->json([
            'name' => 'Events',
            // 'test' => $volcano_events,
            'children' => [
                [
                    'name' => 'Volcanoes',
                    'children' => $volcano_events,
                ],
       
                [
                    'name' => 'Tsunamis',
                    'children' => $tsunami_events,
                ],
                [
                    'name' => 'Earthquakes',
                    'children' => $earthquake_events,

                ],
            ]
        ]);
    }
}
