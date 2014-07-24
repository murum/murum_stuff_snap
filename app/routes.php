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