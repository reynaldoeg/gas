<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


#Gas
Route::get('/getallgases', 'GasController@getallgases');
Route::get('/getalllocations', 'GasController@getalllocations');
Route::get('/getgas/{place_id}', 'GasController@getgas');


# ZipCodes
Route::get('/getstates', 'ZipCodeController@getStates');
Route::get('/getmunicipality/{state}', 'ZipCodeController@getMunicipality');