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
Route::get('/events/byName/{partialName}', 'EventController@byName');

Route::apiResource('/persons', 'PersonController');
Route::get('/persons/perpage/{amount}', 'PersonController@perpage');
Route::get('/persons/byName/{partialName}', 'PersonController@byName');

Route::apiResource('/pages', 'PageController');
Route::get('/pages/perpage/{amount}', 'PageController@perpage');
Route::get('/pages/byName/{partialName}', 'PageController@byName');
Route::get('/pages/byPersonName/{fullPersonName}', 'PageController@byPersonName');
Route::get('/pages/bySpecificPerson/{idPerson}', 'PageController@bySpecificPerson');
Route::get('/pages/{idPage}/mainThePage', 'PageController@mainThePage');

Route::get('/test', 'FacebookEventController@getEvents');
Route::get('/testsave', 'FacebookEventController@storeEvents');
