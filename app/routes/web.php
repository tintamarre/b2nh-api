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

    $router->get('/volcanos/{volcano_id}', [
        'as' => 'api.volcanoes.show',
        'uses' => 'Api\VolcanoController@show',
    ]);

    $router->get('/volcanos/', [
        'as' => 'api.volcanoes.index',
        'uses' => 'Api\VolcanoController@index',
    ]);

    $router->get('/tsunamis/', [
        'as' => 'api.tsunamis.index',
        'uses' => 'Api\TsunamiController@index',
    ]);


    $router->get('/tsunamis/{tsunami_id}', [
        'as' => 'api.tsunamis.show',
        'uses' => 'Api\TsunamiController@show',
    ]);


    $router->get('/earthquakes/', [
        'as' => 'api.earthquakes.index',
        'uses' => 'Api\EarthquakeController@index',
    ]);

    $router->get('/earthquakes/{earthquake_id}', [
        'as' => 'api.earthquakes.show',
        'uses' => 'Api\EarthquakeController@show',
    ]);
});
