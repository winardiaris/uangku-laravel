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

Route::get('/', 'HomeController@welcome');
Route::auth();

Route::get('/home', 'HomeController@index');
// Route::get('/', ['as' => 'index', 'middleware' => 'web', 'uses' => 'HomeController@index']);
// Route::resource('data', ['as' => 'data', 'middleware' => 'web', 'uses' => 'DataController']);
Route::resource('data', 'DataController');
Route::get('/saldo','DataController@getSaldo');


Route::get('/user', 'UsersController@index');
Route::get('/user/setting', 'UsersController@edit');
Route::post('/user/update', 'UsersController@update');
