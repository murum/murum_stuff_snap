<?php

Route::get('/', array('as' => 'home', 'uses' => 'UsersController@index'));
Route::get('users/create', array('as' => 'users.create', 'uses' => 'UsersController@create') );
Route::get('skapa', array('uses' => 'UsersController@create') );
Route::get('user/{username}', array('as' => 'users.show', 'uses' => 'UsersController@show') );
Route::post('users/create', array('as' => 'users.store', 'uses' => 'UsersController@store') );
Route::get('users/bump', array('as' => 'users.bump', 'uses' => 'UsersController@get_bump') );
Route::post('users/bump', array('as' => 'users.bump', 'uses' => 'UsersController@post_bump') );

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

Route::post('contact', array(
    'as' => 'contact.post',
    'uses' => 'ContactController@contact'
));

Route::get('feedback', array(
    'as' => 'static.feedback',
    'uses' => 'StaticController@feedback'
));

Route::post('feedback', array(
    'as' => 'feedback.post',
    'uses' => 'StaticController@send_feedback'
));

Route::get(
    '/uploads/{file}',
    'ImagesController@get_image'
);
