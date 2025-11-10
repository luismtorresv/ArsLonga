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
             *
             * @example 1
             */
            'id' => $this->getId(),

            /**
             * Title of the artwork.
             *
             * @example "The Starry Night"
             */
            'title' => $this->getTitle(),

            /**
             * Author of the artwork.
             *
             * @example "Vincent van Gogh"
             */
            'author' => $this->getAuthor(),

            /**
             * Price of the artwork. Always in US dollars.
             *
             * @example 200000000
             */
            'price' => $this->getPrice(),

            /**
             * Additional details related to the artwork.
             *
             * @example "The Starry Night is an oil-on-canvas painting …"
             */
            'details' => $this->getDetails(),

            /**
             * Short keyword.
             *
             * @example "post-impressionism"
             */
            'keyword' => $this->getKeyword(),

            /**
             * Type of artwork.
             *
             * @example "Painting"
             */
            'category' => $this->getCategory(),

            /**
             * Link to the image associated to the artwork.
             *
             * @example "https://example.com/storage/1.png"
             */
            'image' => asset('/storage/'.$this->getImage()),

            /**
             * Direct link to the artwork's page in the store.
             *
             * @example "https://example.com/artwork/1"
             */
            'link' => route('artwork.show', ['id' => $this->getId()]),
        ];
    }
}
