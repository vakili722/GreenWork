<?php

Route::group(['middleware' => 'auth'], function () {
    // Dashboard Page Route
    Route::get('dashboard', 'HomeController@getIndex');
    Route::get('home', 'HomeController@getIndex');
    Route::get('/', 'HomeController@getIndex');
    Route::post('dashboard', 'HomeController@postIndex');
    Route::post('home', 'HomeController@postIndex');
    Route::post('/', 'HomeController@postIndex');

    // Dynamic Page Routes
//    Route::get('page/{name}', 'PageController@getIndex');
//    Route::post('page/{name}', 'PageController@postIndex');

    /* --- * Report Routes * --- */
//    Route::get('report/[name]', 'Reports\[name]\Controller@getIndex');
//    Route::post('report/[name]', 'Reports\[name]\Controller@postIndex');

    /* --- * Static Page Routes * --- */
    // Profile Route
    Route::get('profile', 'ProfileController@getIndex');
    Route::post('profile', 'ProfileController@postIndex');
    // Users Route
    Route::get('user/{filter?}', 'UserController@getIndex');
    Route::post('user', 'UserController@postIndex');
    // Groups Route
    Route::get('group', 'GroupController@getIndex');
    Route::post('group', 'GroupController@postIndex');
    // Tasks Route
    Route::get('task', 'TaskController@getIndex');
    Route::post('task', 'TaskController@postIndex');
    // Permissions Route
    Route::get('permission', 'PermissionController@getIndex');
    Route::post('permission', 'PermissionController@postIndex');
    // Roles Route
    Route::get('role', 'RoleController@getIndex');
    Route::post('role', 'RoleController@postIndex');
    // Documents Route
    Route::get('document', 'DocumentController@getIndex');
    Route::post('document', 'DocumentController@postIndex');
    // Dossiers Route
    Route::get('dossier', 'DossierController@getIndex');
    Route::post('dossier', 'DossierController@postIndex');
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
