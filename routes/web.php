<?php

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

//$router->get('/', function () use ($router) {
//    return $router->app->version();
//});

$api = app('Dingo\Api\Routing\Router');

$api->version('v1',function ($api){

    $api->get('/',function (){
        throw new
        Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException([],"Method Not Allowed");
    });

    $api->get('students','App\Http\Controllers\StudentController@showAll');
    $api->get('students/{id}','App\Http\Controllers\StudentController@show');
    $api->post('students','App\Http\Controllers\StudentController@store');
    $api->put('students/{id}','App\Http\Controllers\StudentController@update');
    $api->delete('students/{id}','App\Http\Controllers\StudentController@destroy');

});