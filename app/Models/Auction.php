<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\User;

class Auction extends Model
{
    use HasFactory;
    /*
    AUCTION ATTRIBUTES
    $this->attributes['id'] - int - contains the product primary key (id)
    $this->attributes['created_at'] - timestamp - contains the time when the auction was created
    $this->attributes['updated_at'] - timestamp - contains the time when the auction was last updated
    $this->attributes['price'] - int  - contains the price of the auctioned object
    $this->attributes['winning_bidder_id'] - bigint  - contains the id of the customer who won the auction
    $this->attributes['artwork_id'] - bigint  - contains the id of the artwork sold in the auction   
    $this->bids - bids[] - contains the associated bids. 
    */

    protected $fillable = ['price', 'winning_bidder_id'];

    public static function validate(Request $request): void
    {
        $request->validate([
            'price' => 'required',
            'winning_bidder_id' => ['exists:users,id', 'required']
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

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getWinningBiddingUser(): User
    {
        return User::find($this->attributes['winning_bidder_id']);
    }

    public function setWinningBiddingUser(int $winningBiddingUserId): void
    {
        $this->attributes['winning_bidder_id'] = $winningBiddingUserId;
    }
}