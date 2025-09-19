<?php

use App\Http\Controllers\Admin\AdminArtworkController;
use App\Http\Controllers\Admin\AdminHomeController;
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

Route::middleware(['auth', 'admin'])->controller(AdminHomeController::class)->group(function () {
    Route::get('/admin', 'index')->name('admin.index');
});

Route::middleware(['auth', 'admin'])->controller(AdminArtworkController::class)->group(function () {
    Route::get('/admin/artwork', 'index')->name('admin.artwork.index');
    Route::post('admin/artwork/save/{id?}', 'save')->name('admin.artwork.save');
    Route::get('admin/artwork/create/success', 'createSuccess')->name('admin.artwork.createSuccess');
    Route::get('admin/artwork/create', 'create')->name('admin.artwork.create');
    Route::delete('admin/artwork/delete/{id}', 'delete')->name('admin.artwork.delete');
    Route::get('admin/artwork/{id}', 'show')->name('admin.artwork.show');
    Route::get('admin/artwork/edit/{id}', 'edit')->name('admin.artwork.edit');
});

// Auction routes
Route::get('/auction', 'App\Http\Controllers\AuctionController@index')->name('auction.index');
Route::get('/auction/create', 'App\Http\Controllers\AuctionController@create')->name('auction.create');
Route::post('/auction/save', 'App\Http\Controllers\AuctionController@save')->name('auction.save');

Auth::routes();
