<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArtworkResource;
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
        return ArtworkResource::collection(Artwork::all());
    }

    /**
     * List artworks, but paginated.
     *
     * List all artworks in the store, but paginated.
     */
    public function paginate(): ResourceCollection
    {
        return ArtworkResource::collection(Artwork::paginate());
    }
}
