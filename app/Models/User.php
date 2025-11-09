<?php

/**
 * @author Wendysita
 */

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * USER ATTRIBUTES
     * $this->attributes['id'] - int - contains the user's primary key (id)
     * $this->attributes['name'] - string - contains the user's name
     * $this->attributes['address'] - string - contains the user's address
     * $this->attributes['balance'] - int - contains the user's balance
     * $this->attributes['email'] - string - contains the user's email
     * $this->attributes['role'] - string - contains the user's role (admin or client)
     * $this->attributes['email_verified_at'] - timestamp - contains the user's email verification
     * $this->attributes['password'] - string - contains the user's password (hashed)
     * $this->attributes['created_at'] - timestamp - contains the user's creation date
     * $this->attributes['updated_at'] - timestamp - contains the user's update date
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function subtractFromBalance($amount): void
    {
        $currentAmount = $this->getBalance();

        $this->setBalance($currentAmount - $amount);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getEmail(): string
    {
        return $this->attributes['email'];
    }

    public function setEmail(string $email): void
    {
        $this->attributes['email'] = $email;
    }

    public function getRole(): string
    {
        return $this->attributes['role'];
    }

    public function setRole(string $role): void
    {
        $this->attributes['role'] = $role;
    }

    public function getAddress(): string
    {
        return $this->attributes['address'] ?? '';
    }

    public function setAddress(?string $address): void
    {
        $this->attributes['address'] = $address;
    }

    public function getBalance(): int
    {
        return $this->attributes['balance'];
    }

    public function setBalance(int $balance): void
    {
        $this->attributes['balance'] = $balance;
    }

    public function setPassword(string $password): void
    {
        $this->attributes['password'] = $password;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public static function validate(Request $request, User $user): void
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'address' => 'nullable|string|max:255',
            ],
            [
                'name.required' => __('validation.required', ['attribute' => __('user.name')]),
                'address.max' => __('validation.max.string', ['attribute' => __('user.address'), 'max' => 255]),
            ]
        );
    }
}
