<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArtworkCollection;
use App\Models\Artwork;
use Illuminate\Http\JsonResponse;

class ArtworkApiController extends Controller
{
    public function index(): JsonResponse
    {
        $artworks = new ArtworkCollection(Artwork::all());

        return response()->json($artworks, 200);
    }

    public function paginate(): JsonResponse
    {
        $artworks = new ArtworkCollection(Artwork::paginate(5));

        return response()->json($artworks, 200);
    }
}
