<?php

/**
 * @author Jeronimo Acosta
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class Auction extends Model
{
    use HasFactory;

    /**
     * AUCTION ATTRIBUTES
     * $this->attributes['id'] - int - contains the auction's primary key (id)
     * $this->attributes['created_at'] - timestamp - contains the time when the auction was created
     * $this->attributes['updated_at'] - timestamp - contains the time when the auction was last updated
     * $this->attributes['final_date'] - timestamp  - contains the time limit of the auction
     * $this->attributes['winning_bidder_id'] - bigint  - contains the id of the customer who won the auction
     * $this->attributes['artwork_id'] - bigint  - contains the id of the artwork sold in the auction
     *
     * $this->artwork - Artwork - contains the associated artwork
     * $this->winning_bidder - User - contains the winning bidder's associated user
     * $this->bids - bids[] - contains the associated bids
     */
    protected $fillable = ['final_date', 'winning_bidder_id', 'artwork_id'];

    public static function validate(Request $request): void
    {
        $request->validate([
            'start_date' => 'required|date|date_format:Y-m-d\\TH:i',
            'final_date' => 'required|date|date_format:Y-m-d\\TH:i|after:start_date',
            'artwork_id' => 'required|exists:artworks,id',
            'winning_bidder_id' => 'nullable|exists:users,id',
        ]);
    }

    public function determineHighestBidder(): ?Bid
    {
        // @phpstan-ignore-next-line
        return $this->bids->sortByDesc('price_offering')->first();
    }

    public function closeAuction(): bool
    {
        $highestBidder = $this->determineHighestBidder();
        if (! $highestBidder) {
            return false;
        }

        $currentTime = now();
        $finalDate = $this->getFinalDate();
        if ($currentTime->lt($finalDate)) {
            return false;
        }

        $this->setWinningBidderId($highestBidder->getUserId());
        $this->save();

        return true;
    }

    public function hasEnded(): bool
    {
        return now() >= $this->getFinalDate();
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

    public function getStartDate(): mixed
    {
        return $this->attributes['start_date'];
    }

    public function setStartDate(mixed $start_date): void
    {
        $this->attributes['start_date'] = $start_date;
    }

    public function getFinalDate(): mixed
    {
        return $this->attributes['final_date'];
    }

    public function setFinalDate(mixed $final_date): void
    {
        $this->attributes['final_date'] = $final_date;
    }

    public function winning_bidder(): BelongsTo
    {
        return $this->belongsTo(User::class, 'winning_bidder_id');
    }

    public function getWinningBidder(): ?User
    {
        // @phpstan-ignore-next-line
        return $this->winning_bidder;
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
}
