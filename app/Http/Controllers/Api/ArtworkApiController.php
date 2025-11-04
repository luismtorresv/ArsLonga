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
        $products = new ArtworkCollection(Artwork::all());

        return response()->json($products, 200);
    }

    public function paginate(): JsonResponse
    {
        $products = new ArtworkCollection(Artwork::paginate(5));

        return response()->json($products, 200);
    }
}
