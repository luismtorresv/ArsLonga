<?php

/**
 * @author Wendysita
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class Order extends Model
{
    /**
     * ORDER ATTRIBUTES
     *
     * $this->attributes['id'] - int - contains the order's primary key (id)
     * $this->attributes['total'] - int - contains the order's total price
     * $this->attributes['user_id'] - int - contains the referenced user id 
     * $this->attributes['purchase_date'] - timestamp - contains the order's purchase date
     * $this->attributes['created_at'] - timestamp - contains the order creation date
     * $this->attributes['updated_at'] - timestamp - contains the order update date
     *
     * $this->user - User - contains the associated User
     * $this->item - Item - contains the associated Items
     */
    
    protected $fillable = [
        'user_id',
        'purchase_date',
    ];


    public static function validate(Request $request): void
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getTotal(): int
    {
        return $this->attributes['total'];
    }

    public function setTotal(int $total): void
    {
        $this->attributes['total'] = $total;
    }

    public function getUserId(): int
    {
        return $this->attributes['user_id'];
    }

    public function setUserId(int $userId): void
    {
        $this->attributes['user_id'] = $userId;
    }
    
    public function getPurchaseDate(): string
    {
        return $this->attributes['purchase_date'];
    }

    public function setPurchaseDate(string $purchase_date): string
    {
        $this->attributes['purchase_date'] = $purchase_date;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function getItems(): Collection
    {
        return $this->items;
    }
}
