<?php

use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home.index');
});

Route::controller(ArtworkController::class)->group(function () {
    Route::get('/artwork/list', 'index')->name('artwork.index');
    Route::get('/artwork/{id}', 'show')->name('artwork.show');
});

Route::controller(UserController::class)->middleware(['auth'])->group(function () {
    Route::get('/user', 'index')->name('user.index');
    Route::get('/user/edit', 'edit')->name('user.edit');
    Route::post('/user/update', 'update')->name('user.update');
    Route::post('/user/changePassword', 'changePassword')->name('user.changePassword');
});

Auth::routes();
