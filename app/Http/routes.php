<?php

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', 'HomeController@getIndex');
    Route::get('home', 'HomeController@getIndex');
    Route::get('/', 'HomeController@getIndex');
    Route::post('dashboard', 'HomeController@getIndex');
    Route::post('home', 'HomeController@getIndex');
    Route::post('/', 'HomeController@getIndex');
    
    Route::get('profile', 'ProfileController@getIndex');
    Route::post('profile', 'ProfileController@getIndex');
    
    Route::get('page/static/{name}', 'PageController@getIndexStatic');
    Route::get('page/dynamic/{name}', 'PageController@getIndexDynamic');
    Route::post('page/static/{name}', 'PageController@postIndexStatic');
    Route::post('page/dynamic/{name}', 'PageController@postIndexDynamic');
    
    Route::get('report/{name}', 'ReportController@getIndex');
    Route::post('report/{name}', 'ReportController@postIndex');
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');
