<?php

/**
 * @author Jeronimo Acosta
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $winning_bidder_id
 * @property int $artwork_id
 * @property \Illuminate\Support\Carbon|null $start_date
 * @property \Illuminate\Support\Carbon|null $final_date
 * @property-read \App\Models\Artwork $artwork
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Bid> $bids
 * @property-read int|null $bids_count
 * @property-read \App\Models\User|null $winning_bidder
 *
 * @method static \Database\Factories\AuctionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Auction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Auction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Auction query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Auction whereArtworkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Auction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Auction whereFinalDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Auction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Auction whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Auction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Auction whereWinningBidderId($value)
 */
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
    protected $fillable = [
        'start_date',
        'final_date',
        'winning_bidder_id',
        'artwork_id',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'final_date' => 'datetime',
        'created_at' => 'datetime',
        'modified_at' => 'datetime',
    ];

    public function findTopBidder(): ?Bid
    {
        return $this->bids->sortByDesc('price_offering')->first();
    }

    public function closeAuction(): bool
    {
        $highestBidder = $this->findTopBidder();
        if (! $highestBidder) {
            return false;
        }

        $currentTime = now();
        $finalDate = $this->getFinalDate();
        if ($currentTime->lt($finalDate)) {
            return false;
        }

        $this->winning_bidder()->associate($highestBidder);
        $this->save();

        return true;
    }

    public function hasAWinner(): bool
    {
        return ! $this->isActive() && $this->findTopBidder();
    }

    public function isActive(): bool
    {
        return ($this->getStartDate() <= now()) && (now() <= $this->getFinalDate());
    }

    public function hasStarted(): bool
    {
        return now() >= $this->getStartDate();
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
        return $this->created_at;
    }

    public function getUpdatedAt(): mixed
    {
        return $this->updated_at;
    }

    public function getStartDate(): mixed
    {
        return $this->start_date;
    }

    public function setStartDate(mixed $start_date): void
    {
        $this->attributes['start_date'] = $start_date;
    }

    public function getFinalDate(): mixed
    {
        return $this->final_date;
    }

    public function setFinalDate(mixed $final_date): void
    {
        $this->attributes['final_date'] = $final_date;
    }

    public function winning_bidder(): BelongsTo
    {
        return $this->belongsTo(User::class, 'winning_bidder_id');
    }

    public function artwork(): BelongsTo
    {
        return $this->belongsTo(Artwork::class);
    }

    public function bids(): HasMany
    {
        return $this->hasMany(Bid::class);
    }
}
