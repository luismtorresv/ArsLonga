<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Artwork;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ArtworkApiController extends Controller
{
    /**
     * List artworks.
     *
     * List all artworks in the store.
     */
    public function index(): ResourceCollection
    {
        $artworks = Artwork::all()->toResourceCollection();

        return $artworks;
    }

    /**
     * List artworks, but paginated.
     *
     * List all artworks in the store, but paginated.
     */
    public function paginate(): ResourceCollection
    {
        $artworks = Artwork::paginate()->toResourceCollection();

        return $artworks;
    }
}
