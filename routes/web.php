<?php

use App\Http\Controllers\Admin\AdminArtworkController;
use App\Http\Controllers\Admin\AdminAuctionController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\AuctionController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Language\LanguageController;
use App\Http\Controllers\OrderController;
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

Route::middleware(['auth', 'admin'])->controller(AdminAuctionController::class)->group(function () {
    Route::get('/admin/auction', 'index')->name('admin.auction.index');
    Route::get('admin/auction/create', 'create')->name('admin.auction.create');
    Route::get('admin/auction/create/success', 'createSuccess')->name('admin.auction.createSuccess');
    Route::delete('admin/auction/delete/{id}', 'delete')->name('admin.auction.delete');
    Route::get('admin/auction/{id}', 'show')->name('admin.auction.show');
    Route::post('admin/auction/save/{id?}', 'save')->name('admin.auction.save');
    Route::get('admin/auction/edit/{id}', 'edit')->name('admin.auction.edit');
});

Route::controller(AuctionController::class)->group(function () {
    Route::get('/auction', 'index')->name('auction.index');
    Route::get('/auction/show/{id}', 'show')->name('auction.show');
});

Route::middleware(['auth'])->controller(CartController::class)->group(function () {
    Route::get('/cart', 'index')->name('cart.index');
    Route::post('/cart/add/{id}', 'add')->name('cart.add');
    Route::post('/cart/remove/{id}', 'remove')->name('cart.remove');
    Route::post('/cart/purchase', 'purchase')->name('cart.purchase');
});

Route::middleware(['auth'])->controller(OrderController::class)->group(function () {
    Route::get('/orders', 'index')->name('order.index');
});

Route::controller(BidController::class)->group(function () {
    Route::get('/bid/create/{auction_id}', 'create')->name('bid.create');
    Route::post('/bid/save', 'save')->name('bid.save');
});

Route::controller(LanguageController::class)->group(function () {
    Route::get('/language/{language}', 'change')->name('language.switch');
});

Auth::routes();
