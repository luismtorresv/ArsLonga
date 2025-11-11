<?php

/**
 * @author Luis Torres
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * @property int $id
 * @property string $title
 * @property string $author
 * @property string $keyword
 * @property string $category
 * @property string $details
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $price
 *
 * @method static \Database\Factories\ArtworkFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Artwork newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Artwork newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Artwork query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Artwork whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Artwork whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Artwork whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Artwork whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Artwork whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Artwork whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Artwork whereKeyword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Artwork wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Artwork whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Artwork whereUpdatedAt($value)
 */
class Artwork extends Model
{
    use HasFactory;

    public static function validate(Request $request): void
    {
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'keyword' => 'required|max:50',
            'category' => 'required|max:30',
            'price' => 'required|gt:0',
            'details' => 'required|max:255',
            'image' => 'image',
        ]);
    }

    public function storeImageOnDisk(Request $request, ?int $artworkId): void
    {
        if (! $artworkId) {
            $this->setImage('default.png');

            return;
        }

        if ($request->hasFile('image')) {
            $imageName = $this->getId().'.'.$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $this->setImage($imageName);
        }

    }

    public function deleteImageFromDisk(): void
    {
        if ($this->getImage() !== 'default.png') {
            Storage::disk('public')->delete($this->getImage());
        }

    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getTitle(): string
    {
        return $this->attributes['title'];
    }

    public function setTitle(string $title): void
    {
        $this->attributes['title'] = $title;
    }

    public function getAuthor(): string
    {
        return $this->attributes['author'];
    }

    public function setAuthor(string $author): void
    {
        $this->attributes['author'] = $author;
    }

    public function getKeyword(): string
    {
        return $this->attributes['keyword'];
    }

    public function setKeyword(string $keyword): void
    {
        $this->attributes['keyword'] = $keyword;
    }

    public function getCategory(): string
    {
        return $this->attributes['category'];
    }

    public function setCategory(string $category): void
    {
        $this->attributes['category'] = $category;
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getDetails(): string
    {
        return $this->attributes['details'];
    }

    public function setDetails(string $details): void
    {
        $this->attributes['details'] = $details;
    }

    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    public function setImage(string $image): void
    {
        $this->attributes['image'] = $image;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function auction(): BelongsTo
    {
        return $this->belongsTo(Auction::class);
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
