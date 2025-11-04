<?php

use Illuminate\Support\Facades\Route;

Route::get('/artworks', 'App\Http\Controllers\Api\ArtworkApiController@index')->name('api.artwork.index');
Route::get('/artworks/paginate', 'App\Http\Controllers\Api\ArtworkApiController@paginate')->name('api.artwork.paginate');
