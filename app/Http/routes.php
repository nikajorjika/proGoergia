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
Route::post('/add_field', 'AddController@store_field');
Route::get('/add_field', 'AddController@add_field');
Route::post('/add_term', 'AddController@store_term');
Route::get('/add_term', 'AddController@add_term');
Route::post('/add_municipality', 'AddController@store_municipality');
Route::get('/add_municipality', 'AddController@add_municipality');
Route::post('/add_region', 'AddController@store_region');
Route::get('/add_region', 'AddController@add_region');
Route::post('/add_announcement', 'AddController@store_announcement');
Route::get('/add_announcement/', 'AddController@add_announcement');
Route::post('/add_seek_announcement', 'AddController@store_seek_announcement');
Route::get('/add_seek_announcement/', 'AddController@add_seek_announcement');
Route::get('/municipalities/{id}', 'GetController@get_municipalities_by_id');
