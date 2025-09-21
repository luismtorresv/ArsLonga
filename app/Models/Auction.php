<?php

/**
 * @author Jeronimo Acosta
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class Auction extends Model
{
    /*
    AUCTION ATTRIBUTES
    $this->attributes['id'] - int - contains the auction's primary key (id)
    $this->attributes['created_at'] - timestamp - contains the time when the auction was created
    $this->attributes['updated_at'] - timestamp - contains the time when the auction was last updated
    $this->attributes['original_price'] - int  - contains the original price of the auctioned object
    $this->attributes['final_price'] - int - contains the final price of the auctioned object
    $this->attributes['winning_bidder_id'] - bigint  - contains the id of the customer who won the auction
    $this->attributes['artwork_id'] - bigint  - contains the id of the artwork sold in the auction
    $this->bids - bids[] - contains the associated bids.
    */

    protected $fillable = ['original_price', 'final_price', 'winning_bidder_id', 'artwork_id'];

    public static function validate(Request $request): void
    {
        $request->validate([
            'original_price' => 'required',
            'final_price' => 'required',
            'winning_bidder_id' => ['exists:users,id', 'required'],
            'artwork_id' => ['exists:artworks,id', 'required'],
        ]);
    }

    public function getCreatedAt(): mixed
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): mixed
    {
        return $this->attributes['updated_at'];
    }

    public function getOriginalPrice(): int
    {
        return $this->attributes['original_price'];
    }

    public function setOriginalPrice(int $original_price): void
    {
        $this->attributes['original_price'] = $original_price;
    }

    public function getFinalPrice(): int
    {
        return $this->attributes['final_price'];
    }

    public function setFinalPrice(int $final_price): void
    {
        $this->attributes['final_price'] = $final_price;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function setWinningBiddingUserId(int $winningBiddingUserId): void
    {
        $this->attributes['winning_bidder_id'] = $winningBiddingUserId;
    }

    public function artwork(): BelongsTo
    {
        return $this->belongsTo(Artwork::class);
    }

    public function setArtworkId(int $artwork_id): void
    {
        $this->attributes['artwork_id'] = $artwork_id;
    }
}
