<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('users/trash', ['as' => 'users.trash', 'uses' => 'UserController@trash']);
Route::get('users/restore/{id}', ['as' => 'users.restore', 'uses' => 'UserController@restore']);
Route::delete('users/trash/{id}', ['as' => 'users.force_delete', 'uses' => 'UserController@forceDelete']);
Route::resource('users', 'UserController');