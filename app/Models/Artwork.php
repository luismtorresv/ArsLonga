<?php

/**
 * @author Luis Torres
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Artwork extends Model
{
    use HasFactory;

    /**
     * ARTWORK ATTRIBUTES
     * $this->attributes['id'] - int - contains the artwork primary key (id)
     * $this->attributes['title'] - string - contains the artwork name
     * $this->attributes['author'] - string - contains the author name
     * $this->attributes['keyword'] - string - contains the keyword
     * $this->attributes['category'] - string - contains the category
     * $this->attributes['price'] - int - contains the artwork's price
     * $this->attributes['details'] - string - contains the artwork details
     * $this->attributes['image'] - string - contains the artwork image
     * $this->attributes['created_at'] - timestamp - contains the artwork creation date
     * $this->attributes['updated_at'] - timestamp - contains the artwork update date
     *
     * $this->auction - Auction - the associated auction
     * $this->item - Item - the associated item
     */
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

    public function auction(): HasOne
    {
        return $this->hasOne(Auction::class);
    }

    public function item(): HasOne
    {
        return $this->hasOne(Item::class);
    }
}
