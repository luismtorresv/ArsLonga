<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArtworkResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->getId(),
            'title' => $this->getTitle(),
            'author' => $this->getAuthor(),
            'price' => $this->getPrice(),
            'image' => asset('/storage/'.$this->getImage()),
            'details' => $this->getDetails(),
            'keyword' => $this->getKeyword(),
            'category' => $this->getCategory(),
            'link' => route('artwork.show', ['id' => $this->getId()]),
        ];
    }
}
