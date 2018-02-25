<?php

//use Illuminate\Http\Request;

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

Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');

Route::middleware('auth:api')->group(function () {

	Route::get('countries', 'CountriesController@list');
	Route::get('countries/{country?}', 'CountriesController@country');
	Route::post('countries', 'CountriesController@insertCountry');
	Route::put('countries', 'CountriesController@updateCountry');
	Route::delete('countries', 'CountriesController@deleteCountry');

	Route::get('countries/locations/all', 'LocationsController@list');
	Route::get('countries/{country}/locations/{location?}', 'LocationsController@location');
	Route::post('countries/locations', 'LocationsController@insertLocation');
	Route::put('countries/locations', 'LocationsController@updateLocation');
	Route::delete('countries/locations', 'LocationsController@deleteLocation');

});
