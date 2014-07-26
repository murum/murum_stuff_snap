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

Route::get('search', array(
    'as' => 'search.index',
    'uses' => 'SearchController@index'
));

Route::post('search', array(
    'as' => 'search.post',
    'uses' => 'SearchController@search'
));

Route::get('about', array(
    'as' => 'static.about',
    'uses' => 'StaticController@about'
));
Route::get('rules', array(
    'as' => 'static.rules',
    'uses' => 'StaticController@rules'
));
Route::get('contact', array(
    'as' => 'static.contact',
    'uses' => 'StaticController@contact'
));