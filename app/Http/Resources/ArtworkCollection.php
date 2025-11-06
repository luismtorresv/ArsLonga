<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ArtworkCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection,
            'meta' => [
                'storeName' => 'Ars Longa',
                'storeProductsLink' => 'http://127.0.0.1:8000/artworks',
            ],
        ];
    }
}
