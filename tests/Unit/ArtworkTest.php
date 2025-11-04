<?php

/**
 * @author Luis Torres
 */

use App\Models\Artwork;

test('attributes are set correctly', function () {
    // Create a new Artwork instance with attributes.
    $artwork = new Artwork;
    $artwork->setTitle('Sample Artwork Title');
    $artwork->setAuthor('Sample Author');
    $artwork->setKeyword('sample-keyword');
    $artwork->setPrice(100000);
    $artwork->setDetails('Sample details blah blah blah');
    $artwork->setImage('sample-image.png');

    // Check that attributes were set correctly.
    expect($artwork->getTitle())->toBe('Sample Artwork Title');
    expect($artwork->getAuthor())->toBe('Sample Author');
    expect($artwork->getKeyword())->toBe('sample-keyword');
    expect($artwork->getPrice())->toBe(100000);
    expect($artwork->getDetails())->toBe('Sample details blah blah blah');
    expect($artwork->getImage())->toBe('sample-image.png');
});
