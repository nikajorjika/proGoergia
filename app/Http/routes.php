<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');
Route::post('/add_study_field', 'AddController@store_study_field');
Route::get('/add_study_field', 'AddController@add_study_field');
Route::post('/add_study_term', 'AddController@store_study_term');
Route::get('/add_study_term', 'AddController@add_study_term');
Route::post('/add_location_municipality', 'AddController@store_location_municipality');
Route::get('/add_location_municipality', 'AddController@add_location_municipality');
Route::post('/add_location_region', 'AddController@store_location_region');
Route::get('/add_location_region', 'AddController@add_location_region');
Route::post('/add_announcement', 'AddController@store_announcement');
Route::get('/add_announcement', 'AddController@add_announcement');
Route::get('/municipalities/{id}', 'GetController@get_municipalities_by_id');
