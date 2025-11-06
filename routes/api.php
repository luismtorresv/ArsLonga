<?php

use App\Http\Controllers\Api\ArtworkApiController;
use Illuminate\Support\Facades\Route;

Route::controller(ArtworkApiController::class)->group(function () {
    Route::get('/artworks', 'index')->name('api.artwork.index');
    Route::get('/artworks/paginate', 'paginate')->name('api.artwork.paginate');
});
