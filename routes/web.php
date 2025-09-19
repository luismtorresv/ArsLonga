<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

// Auction routes
Route::get('/auction', 'App\Http\Controllers\AuctionController@index')->name('auction.index');
Route::get('/auction/create', 'App\Http\Controllers\AuctionController@create')->name('auction.create');
Route::post('/auction/save', 'App\Http\Controllers\AuctionController@save')->name('auction.save');

Auth::routes();
