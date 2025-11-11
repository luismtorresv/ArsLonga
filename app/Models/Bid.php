<?php

/**
 * @author Jeronimo Acosta
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class Bid extends Model
{
    /**
     * BID ATTRIBUTES
     * $this->attributes['id'] - int - contains the bid's primary key (id)
     * $this->attributes['created_at'] - timestamp - contains the time when the bid was created
     * $this->attributes['updated_at'] - timestamp - contains the time when the bid was last updated
     * $this->attributes['price_offering'] - int - contains the price offering of the bid made by the user
     * $this->attributes['user_id'] - int - contains the referenced user id
     * $this->attributes['auction_id'] - int - contains the referenced auction id
     *
     * $this->user - User - contains the associated User
     * $this->auction - Auction - contains the associated Auction
     */
    protected $fillable = ['price_offering', 'user_id', 'auction_id'];

    public static function validate(request $request): void
    {
        $request->validate([
            'price_offering' => 'required|gt:0',
        ]);
    }

    public static function determineAuctionWinner(): void {}

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getCreatedAt(): mixed
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): mixed
    {
        return $this->attributes['updated_at'];
    }

    public function getPriceOffering(): int
    {
        return $this->attributes['price_offering'];
    }

    public function setPriceOffering(int $price_offering): void
    {
        $this->attributes['price_offering'] = $price_offering;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getUserId(): ?int
    {
        return $this->attributes['user_id'];
    }

    public function setUserId(int $user_id): void
    {
        $this->attributes['user_id'] = $user_id;
    }

    public function auction(): BelongsTo
    {
        return $this->belongsTo(Auction::class);
    }
}
