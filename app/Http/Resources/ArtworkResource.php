<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArtworkResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            /**
             * Unique ID of the artwork.
             */
            'id' => $this->getId(),

            /**
             * Title of the artwork.
             */
            'title' => $this->getTitle(),

            /**
             * Author of the artwork.
             */
            'author' => $this->getAuthor(),

            /**
             * Price of the artwork. Always in US dollars.
             */
            'price' => $this->getPrice(),

            /**
             * Additional details related to the artwork.
             */
            'details' => $this->getDetails(),

            /**
             * Short keyword like 'oil' or 'impressionism'.
             */
            'keyword' => $this->getKeyword(),

            /**
             * Type of artwork: Painting, Sculpture, etc.
             */
            'category' => $this->getCategory(),

            /**
             * Link to the image associated to the artwork.
             */
            'image' => asset('/storage/'.$this->getImage()),

            /**
             * Direct link to the artwork's page in the store.
             */
            'link' => route('artwork.show', ['id' => $this->getId()]),
        ];
    }
}
