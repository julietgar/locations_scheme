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

Route::middleware('auth:api')->prefix('countries')->group(function () {

	Route::get('/', 'CountriesController@list');
	Route::post('/', 'CountriesController@country');
	Route::put('/', 'CountriesController@updateCountry');
	Route::delete('/', 'CountriesController@deleteCountry');

	Route::get('/locations', 'LocationsController@list');
	Route::post('/locations', 'LocationsController@location');
	Route::put('/locations', 'LocationsController@updateLocation');
	Route::delete('/locations', 'LocationsController@deleteLocation');

});
