<?php

/**
 * @author Luis Torres
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class Item extends Model
{
    /**
     * ITEM ATTRIBUTES
     *
     * $this->attributes['id'] - int - contains the item's primary key (id)
     * $this->attributes['price'] - int - contains the item's price
     * $this->attributes['order_id'] - int - contains the referenced order id
     * $this->attributes['artwork_id'] - int - contains the referenced artwork id
     * $this->attributes['created_at'] - timestamp - contains the item creation date
     * $this->attributes['updated_at'] - timestamp - contains the item update date
     *
     * $this->artwork - Artwork - contains the associated Artwork
     * $this->order - Order - contains the associated Order
     */
    protected $fillable = [
        'price',
        'order_id',
        'artwork_id',
    ];

    public static function validate(Request $request): void
    {
        $request->validate([
            'price' => 'required|numeric|gt:0',
            'order_id' => 'required|exists:orders,id',
            'artwork_id' => 'required|exists:artworks,id',
        ]);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getOrderId(): int
    {
        return $this->attributes['order_id'];
    }

    public function setOrderId(int $orderId): void
    {
        $this->attributes['order_id'] = $orderId;
    }

    public function getArtworkId(): int
    {
        return $this->attributes['artwork_id'];
    }

    public function setArtworkId(int $artworkId): void
    {
        $this->attributes['artwork_id'] = $artworkId;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function artwork(): BelongsTo
    {
        return $this->belongsTo(Artwork::class);
    }

    public function getArtwork(): Artwork
    {
        // @phpstan-ignore-next-line
        return $this->artwork;
    }
}
