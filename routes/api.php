<?php


use App\Http\Controllers\RackController;
use App\Http\Controllers\ShelfController;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\CubeController;


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
    return response()->json([
        'version' => $router->app->version(),
    ]);
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->group(['prefix' => 'cubes'], function () use ($router) {
        $router->get('/', 'CubeController@index');
        $router->post('/', 'CubeController@store');
        $router->get('/{id:[0-9]+}', 'CubeController@show');
        $router->delete('/{id:[0-9]+}', 'CubeController@destroy');
        $router->get('/count/{color_id:[0-9]+}', 'CubeController@countCubesByColor');
    });
});
