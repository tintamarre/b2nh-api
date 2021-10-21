<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Volcano;
use App\Http\Resources\HomePageResource;

class BaseController extends Controller
{
    /**
    * @OA\Get(
    * path="/",
    * summary="Get the homepage of the API",
    * description="Links to API resources",
    * operationId="main",
    * tags={"Main"},
    * @OA\Response(
    *    response=200,
    *    description="Success",
    * )
    * )
    * )
    */
    public function index()
    {
        return new HomePageResource('Hello world!');
    }
}
