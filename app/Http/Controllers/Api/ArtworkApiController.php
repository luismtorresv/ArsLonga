<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Artwork;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ArtworkApiController extends Controller
{
    public function index(): ResourceCollection
    {
        $artworks = Artwork::all()->toResourceCollection();

        return $artworks;
    }

    public function paginate(): ResourceCollection
    {
        $artworks = Artwork::paginate()->toResourceCollection();

        return $artworks;
    }
}
