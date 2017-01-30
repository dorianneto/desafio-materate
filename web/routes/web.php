<?php

Route::get('/', function() { return redirect()->to('login');});
Route::get('login', ['as' => 'auth.login', 'uses' => 'Auth\LoginController@index']);
Route::post('login', ['as' => 'auth.authenticate', 'uses' => 'Auth\LoginController@authenticate']);
Route::get('logout', ['as' => 'auth.logout', 'uses' => 'Auth\LoginController@logout']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('users/trash', ['as' => 'users.trash', 'uses' => 'UserController@trash']);
    Route::get('users/restore/{id}', ['as' => 'users.restore', 'uses' => 'UserController@restore']);
    Route::delete('users/trash/{id}', ['as' => 'users.force_delete', 'uses' => 'UserController@forceDelete']);
    Route::resource('users', 'UserController');
});