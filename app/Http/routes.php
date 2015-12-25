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
    Route::get('page/{name}', 'PageController@getIndex');
    Route::post('page/{name}', 'PageController@postIndex');

    /* --- * Report Routes * --- */
//    Route::get('report/[name]', 'Reports\[name]\Controller@getIndex');
//    Route::post('report/[name]', 'Reports\[name]\Controller@postIndex');

    /* --- * Static Page Routes * --- */
    // Profile Route
    Route::get('profile', 'ProfileController@getIndex');
    Route::post('profile', 'ProfileController@getIndex');
    // Users Route
    Route::get('users', 'UsersController@getIndex');
    Route::post('users', 'UsersController@postIndex');
    // Groups Route
    Route::get('groups', 'GroupsController@getIndex');
    Route::post('groups', 'GroupsController@postIndex');
    // Tasks Route
    Route::get('tasks', 'TasksController@getIndex');
    Route::post('tasks', 'TasksController@postIndex');
    // Permissions Route
    Route::get('permissions', 'PermissionsController@getIndex');
    Route::post('permissions', 'PermissionsController@postIndex');
    // Roles Route
    Route::get('roles', 'RolesController@getIndex');
    Route::post('roles', 'RolesController@postIndex');
    // Documents Route
    Route::get('documents', 'DocumentsController@getIndex');
    Route::post('documents', 'DocumentsController@postIndex');
    // Dossiers Route
    Route::get('dossiers', 'DossiersController@getIndex');
    Route::post('dossiers', 'DossiersController@postIndex');
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
