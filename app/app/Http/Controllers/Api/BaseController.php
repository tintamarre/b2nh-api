<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Volcano;
use App\Http\Resources\HomePageResource;

class BaseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        return new HomePageResource('Hello world!');
    }
}


/**
     * @OA\Get(
     * path="/ECLI/BE/{court_acronym}",
     * summary="Get Court information",
     * description="Get Court",
     * operationId="GetCourtInfo",
     * @OA\Parameter(
     *          name="court_acronym",
     *          description="Court acronym",
     *          required=true,
     *          in="path",
     *          example="CASS",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     * tags={"court"},
     * @OA\Response(
     *    response=200,
     *    description="Success"
     * )
     * )
     */
    // public function show($court_acronym)
    // {
    //     return new CourtResource(Court::whereAcronym($court_acronym)->with('category')
    //         ->firstOrFail());
    // }
