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

\URL::forceScheme('https');

$router->get('/', [
    'as' => 'api.base',
    'uses' => 'Api\ApiController@index',
]);


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

    // event controller
    $router->get('/events/{type}/{event_id}', [
        'as' => 'api.events.show',
        'uses' => 'Api\EventController@show',
    ]);

    $router->get('/events/random', [
        'as' => 'api.events.random',
        'uses' => 'Api\EventController@random',
    ]);
    
    $router->get('/volcanoes/', [
        'as' => 'api.volcanoes.index',
        'uses' => 'Api\VolcanoController@index',
    ]);

    $router->get('/volcanoes_map/', [
        'as' => 'api.volcanoes.map',
        'uses' => 'Api\MapController@map',
    ]);


    $router->get('/filter_map/start/{start_year}/end/{end_year}', [
        'as' => 'api.filter_map',
        'uses' => 'Api\MapController@filter_map',
    ]);


    $router->get('/filter_map_array/start/{start_year}/end/{end_year}', [
        'as' => 'api.filter_map_array',
        'uses' => 'Api\MapController@filter_map_array',
    ]);


    $router->get('/volcanoes_elevation/', [
        'as' => 'api.volcanoes.elevation',
        'uses' => 'Api\VolcanoController@elevation',
    ]);



    // Index pagination
    $router->get('/volcano_events/', [
        'as' => 'api.volcano_events.index',
        'uses' => 'Api\VolcanoEventController@index',
    ]);
    $router->get('/tsunami_events/', [
        'as' => 'api.tsunami_events.index',
        'uses' => 'Api\TsunamiEventController@index',
    ]);

    $router->get('/earthquake_events/', [
        'as' => 'api.earthquake_events.index',
        'uses' => 'Api\EarthquakeEventController@index',
    ]);

    // IMAGE URL FROM PIXABAY
    $router->get('/images/{category}/{item}', [
        'as' => 'api.images.getUrl',
        'uses' => 'Api\ImageController@getUrl',
    ]);

    // CUSTOM
    $router->get('/events_count_per_years/', [
        'as' => 'api.events.count_per_years',
        'uses' => 'Api\EventController@count_per_years',
    ]);

    // CUSTOM
    $router->get('/events_sunburst/', [
        'as' => 'api.events.sunburst',
        'uses' => 'Api\EventController@sunburst',
    ]);




    // CUSTOM
    $router->get('/event_siblings/{type}/{event_id}/nearest/{count}', [
            'as' => 'api.event_siblings.nearest',
            'uses' => 'Api\EventSiblingsController@nearest',
        ]);

    $router->get('/event_siblings/{type}/{event_id}/closest/{count}', [
            'as' => 'api.event_siblings.closest',
            'uses' => 'Api\EventSiblingsController@closest',
        ]);
});
