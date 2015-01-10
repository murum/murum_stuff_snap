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

/*
 * Admin section
 */

Route::filter("admin_ip_allowed", function() {
    if ( ! in_array(Request::getClientIp(), [
        "127.0.0.1",
        "192.168.10.1",
        "83.252.164.5",
        "83.252.97.203",
        "83.252.160.109",
        "195.67.132.74",
        "::1",
    ])) {
        App::abort(404);
    };
});

Route::filter("admin", function() {
    if ( ! Auth::check() ) {
        App::abort(404);
    }
});

Route::group(["before" => "admin_ip_allowed"], function() {
    Route::get("___admin/login", ["as" => "admin.login", "uses" => "AdminController@getLogin"]);
    Route::post("___admin/login", ["as" => "admin.login", "uses" => "AdminController@postLogin"]);
});

Route::group(["before" => "admin|admin_ip_allowed"], function() {
    Route::get("___admin/", ["as" => "admin.dashboard", "uses" => "AdminController@getDashboard"]);
    Route::get("___admin/handle_cards", ["as" => "admin.handle_cards", "uses" => "AdminController@getHandleCards"]);
    Route::get("___admin/delete_card/{id}", ["as" => "admin.delete_card", "uses" => "AdminController@getDeleteCard"]);
    Route::get("___admin/delete_card_block_ip/{id}", ["as" => "admin.delete_card_block_ip", "uses" => "AdminController@getDeleteCardBlockIp"]);
    Route::get("___admin/logout", ["as" => "admin.logout", "uses" => "AdminController@getLogout"]);
    Route::get("___admin/block_ip", ["as" => "admin.block_ip", "uses" => "AdminController@getBlockIp"]);
    Route::post("___admin/block_ip", ["as" => "admin.block_ip", "uses" => "AdminController@postBlockIp"]);
});


