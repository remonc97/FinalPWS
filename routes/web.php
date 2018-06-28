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

$api = app('Dingo\Api\Routing\Router');

$api->version('v1',function ($api){

    $api->get('/',function (){
        throw new
        Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException([],"Method Not Allowed");
    });

    $api->get('mahasiswas','App\Http\Controllers\MahasiswaController@showAll');
    $api->get('mahasiswas/{id}','App\Http\Controllers\MahasiswaController@show');
    $api->post('mahasiswas','App\Http\Controllers\MahasiswaController@store');
    $api->put('mahasiswas/{id}','App\Http\Controllers\MahasiswaController@update');
    $api->delete('mahasiswas/{id}','App\Http\Controllers\MahasiswaController@destroy');

});