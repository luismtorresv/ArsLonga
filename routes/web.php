<?php

use AppApp\Http\Controllers\Admin\AdminHomeController;
use AppApp\Http\Controllers\Admin\AdminArtworkController;
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

Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.index");
Route::get('/admin/artwork', 'App\Http\Controllers\Admin\AdminArtworkController@index')->name('admin.artwork.index');
Route::post('admin/artwork/save/{id?}', 'App\Http\Controllers\Admin\AdminArtworkController@save')->name('admin.artwork.save');
Route::get('admin/artwork/create/success', 'App\Http\Controllers\Admin\AdminArtworkController@createSuccess')->name('admin.artwork.createSuccess');
Route::get('admin/artwork/create', 'App\Http\Controllers\Admin\AdminArtworkController@create')->name('admin.artwork.create');

Route::delete('admin/artwork/delete/{id}', 'App\Http\Controllers\Admin\AdminArtworkController@delete')->name('admin.artwork.delete');
Route::get('admin/artwork/{id}', 'App\Http\Controllers\Admin\AdminArtworkController@show')->name('admin.artwork.show');

Route::get('admin/artwork/edit/{id}', 'App\Http\Controllers\Admin\AdminArtworkController@edit')->name('admin.artwork.edit');

Auth::routes();
