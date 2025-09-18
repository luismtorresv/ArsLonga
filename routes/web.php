<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/user', 'App\Http\Controllers\UserController@index')->name('user.index');
Route::get('/user/edit', 'App\Http\Controllers\UserController@edit')->name('user.edit');
Route::post('/user/update', 'App\Http\Controllers\UserController@update')->name('user.update');

Auth::routes();
