<?php

use Illuminate\Http\Request;
use App\Event;

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
//
//Route::get('/events', function () {
//
//});

Route::apiResource('/events', 'EventController');
Route::get('/events/perpage/{amount}', 'EventController@perpage');
Route::get('/events/percategory/{category}', 'EventController@percategory');
