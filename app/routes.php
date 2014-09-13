<?php

Route::get('/', array('as' => 'home', 'uses' => 'CardsController@index'));
Route::get('cards/create', array('as' => 'cards.create', 'uses' => 'CardsController@create') );
Route::get('skapa', array('uses' => 'CardsController@create') );
Route::get('user/{username}', array('as' => 'cards.show', 'uses' => 'CardsController@show') );
Route::post('cards/create', array('as' => 'cards.store', 'uses' => 'CardsController@store') );
Route::post('kik_image', array('as' => 'cards.kik.image', 'uses' => 'CardsController@kik_image'));
Route::get('cards/bump', array('as' => 'cards.bump', 'uses' => 'CardsController@get_bump') );
Route::post('cards/bump', array('as' => 'cards.bump', 'uses' => 'CardsController@post_bump') );

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

Route::get('update', array(
	'as' => 'static.update',
	'uses' => 'StaticController@update'
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
