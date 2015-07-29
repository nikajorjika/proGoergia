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
Route::get('/delete_seek/{id}', 'DeleteController@delete_seek');
Route::get('/delete/{id}', 'DeleteController@delete_announcement');
Route::get('/search/trainings', 'SearchController@keyword_search_trainings');
Route::get('/search/seek', 'SearchController@keyword_search_seek');
Route::get('/seek/announcements', 'SearchController@render_seek_form_data');
Route::Post('/seek/announcements', 'SearchController@get_seek_announcements');
Route::get('/announcements', 'SearchController@render_form_data');
Route::Post('/announcements', 'SearchController@get_announcements');
Route::get('/announcement/edit/{id}', 'EditController@edit_announcement');
Route::post('/announcement/edit/', 'EditController@save_announcement');
Route::get('/seek_announcement/edit/{id}', 'EditController@edit_seek_announcement');
Route::post('/seek_announcement/edit', 'EditController@save_seek_announcement');
Route::get('/download/{file_name}', 'SearchController@download');
Route::get('/login', 'UserController@login');
Route::post('/user/auth', 'UserController@auth');
Route::get('/admin', 'UserController@admin');

Route::post('/add_field', 'AddController@store_field');
Route::get('/add_field', 'AddController@add_field');
Route::get('/drop_field/{id}', 'AddController@drop_field');
Route::get('/remove_field', 'AddController@remove_field');

Route::post('/add_term', 'AddController@store_term');
Route::get('/add_term', 'AddController@add_term');
Route::get('/drop_term/{id}', 'AddController@drop_term');
Route::get('/remove_term', 'AddController@remove_term');

Route::post('/add_municipality', 'AddController@store_municipality');
Route::get('/add_municipality', 'AddController@add_municipality');

Route::post('/add_region', 'AddController@store_region');
Route::get('/add_region', 'AddController@add_region');

Route::post('/add_announcement', 'AddController@store_announcement');
Route::get('/add_announcement/', 'AddController@add_announcement');
Route::post('/add_seek_announcement', 'AddController@store_seek_announcement');
Route::get('/add_seek_announcement/', 'AddController@add_seek_announcement');

Route::get('/municipalities/{id}', 'GetController@get_municipalities_by_id');
Route::get('/statistic', 'StatisticController@index');
Route::get('/search_statistic/{id}', 'StatisticController@search_statistic');
Route::get('/site/about_project', 'SiteController@about_project');
Route::get('/site/site_map', 'SiteController@site_map');
Route::get('/site/contact', 'SiteController@contact');

Route::controllers([
    'auth'     => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);