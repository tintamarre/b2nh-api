<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return redirect('api/v1');
});


//  Routing
$router->group(['prefix'=>'api/v1'], function () use ($router) {
    $router->get('/', [
        'as' => 'api.base_api',
        'uses' => 'Api\BaseController@index',
    ]);

    $router->get('/volcanoes/{volcano_id}', [
        'as' => 'api.volcanoes.show',
        'uses' => 'Api\VolcanoController@show',
    ]);

    $router->get('/volcanoes/', [
        'as' => 'api.volcanoes.index',
        'uses' => 'Api\VolcanoController@index',
    ]);


    $router->get('/volcano_events/{volcano_event_id}', [
        'as' => 'api.volcano_events.show',
        'uses' => 'Api\VolcanoEventController@show',
    ]);

    $router->get('/volcano_events/', [
        'as' => 'api.volcano_events.index',
        'uses' => 'Api\VolcanoEventController@index',
    ]);


    $router->get('/tsunami_events/', [
        'as' => 'api.tsunami_events.index',
        'uses' => 'Api\TsunamiEventsController@index',
    ]);


    $router->get('/tsunami_events/{tsunami_event_id}', [
        'as' => 'api.tsunami_events.show',
        'uses' => 'Api\TsunamiEventsController@show',
    ]);


    $router->get('/earthquake_events/', [
        'as' => 'api.earthquake_events.index',
        'uses' => 'Api\EarthquakeEventsController@index',
    ]);

    $router->get('/earthquake_events/{earthquake_event_id}', [
        'as' => 'api.earthquake_events.show',
        'uses' => 'Api\EarthquakeEventsController@show',
    ]);
});
