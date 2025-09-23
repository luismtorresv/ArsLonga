<?php

/**
 * @author Jeronimo Acosta
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Auction extends Model
{
    /**
     * AUCTION ATTRIBUTES
     * $this->attributes['id'] - int - contains the auction's primary key (id)
     * $this->attributes['created_at'] - timestamp - contains the time when the auction was created
     * $this->attributes['updated_at'] - timestamp - contains the time when the auction was last updated
     * $this->attributes['price_limit'] - int  - contains the roof of the price. If a bid surpasses this number, it wins the auction.
     * $this->attributes['winning_bidder_id'] - bigint  - contains the id of the customer who won the auction
     * $this->attributes['artwork_id'] - bigint  - contains the id of the artwork sold in the auction
     *
     * $this->artwork - Artwork - contains the associated artwork
     * $this->user - User - contains the associated user
     * $this->bids - bids[] - contains the associated bids
     */
    protected $fillable = ['price_limit', 'winning_bidder_id', 'artwork_id'];

    public function determineHighestBidder(): ?Bid
    {
        // @phpstan-ignore-next-line
        return $this->bids->sortByDesc('price_offering')->first();
    }

    public function assignWinner(): void
    {
        $highest_bidder = $this->determineHighestBidder();

        if (! $highest_bidder) {
            return;
        }

        $highest_offer = $highest_bidder->getPriceOffering();
        $price_limit = $this->getPriceLimit();

        if ($highest_offer < $price_limit) {
            return;
        }

        $this->setWinningBidderId($highest_bidder->getUserId());
        $this->save();
    }

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

    public function getPriceLimit(): int
    {
        return $this->attributes['price_limit'];
    }

    public function setPriceLimit(int $price_limit): void
    {
        $this->attributes['price_limit'] = $price_limit;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getUser(): ?User
    {
        // @phpstan-ignore-next-line
        return $this->user;
    }

    public function getWinningBidderId(): ?int
    {
        return $this->attributes['winning_bidder_id'];
    }

    public function setWinningBidderId(int $winningBiddingId): void
    {
        $this->attributes['winning_bidder_id'] = $winningBiddingId;
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

    public function getArtworkId(): int
    {
        return $this->attributes['artwork_id'];
    }

    public function setArtworkId(int $artwork_id): void
    {
        $this->attributes['artwork_id'] = $artwork_id;
    }

    public function bids(): HasMany
    {
        return $this->hasMany(Bid::class);
    }

    public function getBids(): Collection
    {
        return $this->bids;
    }

    public function setBids(Collection $bids): void
    {
        $this->bids = $bids;
    }
}
