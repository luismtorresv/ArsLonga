<?php

/**
 * @author Luis Torres
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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
            'image' => 'required|image',
        ]);
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
}
