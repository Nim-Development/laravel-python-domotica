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
| -
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('relays', 'Api\RelayController@get_relays');
Route::get('relay/{action}/{id}', 'Api\RelayController@relay');

Route::get('servos', 'Api\ServoController@get_servos');
Route::get('servo/{action}/{id}/{rotate?}', 'Api\ServoController@servo');

Route::get('steppers', 'Api\StepperController@get_steppers');
Route::get('stepper/{action}/{id}', 'Api\StepperController@stepper');
