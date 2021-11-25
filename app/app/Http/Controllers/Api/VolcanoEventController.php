<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\VolcanoEvent;
use App\Http\Resources\VolcanoEventResource;

use DB;

class VolcanoEventController extends Controller
{

     /**
    * @OA\Get(
    * path="/volcano_events/",
    * summary="Get Volcano events informations",
    * description="Get Volcano events paginated",
    * operationId="getVolcanoEventsInfo",
    * tags={"Events"},
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

    public function count_per_years()
    {
        $count_per_years = DB::statement("
                CREATE VIEW
                    volcanoes_count_per_years (min_year, max_year, count_volcano_events) as
                SELECT
                    (round(year / 100) * 100) as start_year,
                    (round(year / 100) * 100) + 100 as end_year,
                COUNT(id) 'Total Events'
                FROM volcano_events
                GROUP BY start_year;
                ");

        return response()->json([
                'data' => $count_per_years
            ]);
    }
}
