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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');


Route::get('/data/add', 'DataController@create');
Route::post('/data/store', 'DataController@store');
Route::get('/data', 'DataController@index');
Route::get('/data/edit/{id}', function($id) {
  $data = App\Data::findOrFail($id);
  return view('data.edit', compact('data'));
});

Route::get('/user', 'UsersController@index');
Route::get('/user/setting', 'UsersController@edit');
Route::get('/user/update', 'UsersController@update');
