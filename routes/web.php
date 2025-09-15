<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

// Auction routes
Route::get('/auction', 'App\Http\Controllers\AuctionController@index')->name('auction.index');

Auth::routes();
