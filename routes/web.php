<?php

use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home.index');
});

Route::controller(ArtworkController::class)->group(function () {
    Route::get('/artwork/list', 'index')->name('artwork.index');
    Route::get('/artwork/{id}', 'show')->name('artwork.show');
});

Route::get('/user', 'App\Http\Controllers\UserController@index')->name('user.index');
Route::get('/user/edit', 'App\Http\Controllers\UserController@edit')->name('user.edit');
Route::post('/user/update', 'App\Http\Controllers\UserController@update')->name('user.update');
Route::post('/user/changePassword', 'App\Http\Controllers\UserController@changePassword')->name('user.changePassword');

Auth::routes();
