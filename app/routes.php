<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'home', 'uses' => 'UsersController@index'));
Route::get('users/create', array('as' => 'users.create', 'uses' => 'UsersController@create') );
Route::get('user/{username}', array('as' => 'users.show', 'uses' => 'UsersController@show') );
Route::post('users/create', array('as' => 'users.store', 'uses' => 'UsersController@store') );

Route::post('images/create', array('as' => 'images.store', 'uses' => 'ImagesController@store') );
Route::post('images/update', array('as' => 'images.update', 'uses' => 'ImagesController@update') );