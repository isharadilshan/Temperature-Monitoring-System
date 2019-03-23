<?php

Auth::routes(['verify' => true]);//email verified auth routes

Route::group(['namespace' => 'Page'],function(){

    Route::get('/', 'PageController@index')->name('main');//main page route
    Route::get('/about', 'PageController@about')->name('about');
    Route::get('/store', 'PageController@store');
});

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');//route for user first time registration


Route::group(['namespace' => 'Admin' ,'middleware' => ['admin','verified']], function() {

    Route::get('/admin','PageController@index')->name('admin');
    Route::resource('admin/device','DeviceController');//only on show route and live
    Route::resource('admin/mold','MoldController');//only on live
    Route::resource('admin/watchman','PersonController');
    Route::get('/graph/{id}','PageController@getMolds')->name('graph');

});


Route::group(['middleware' => ['user','verified']], function() {

    // Route::get('/home', 'HomeController@index')->name('home');

});

Route::group(['namespace' => 'User' ,'middleware' => ['user','verified']], function() {

    Route::get('/user','PageController@index')->name('user');

});