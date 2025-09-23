<?php

/**
 * @author Jeronimo Acosta
 */

return [
    'index' => [
        'no_auctions' => 'No auctions available at the moment.',
        'auction_number' => 'Auction #:id',
        'price_limit' => 'Price Limit: $:amount',
    ],
    'show' => [
        'auction_title' => 'Auction #:id',
        'original_price' => 'Original Price: $:amount',
        'price_limit' => 'Price Limit: $:amount',
        'artwork_details' => 'Artwork Details',
        'title' => 'Title: :title',
        'author' => 'Author: :author',
        'category' => 'Category: :category',
        'winning_bidder' => 'Winning Bidder',
        'user_id' => 'User ID: :id',
        'auction_id' => 'Auction ID: :id',
        'created' => 'Created: :date',
        'status' => [
            'won' => 'Won',
            'active' => 'Active',
        ],
        'bids' => [
            'title' => 'Available Bids',
            'no_bids' => 'No bids available for this auction yet.',
            'bid_by' => 'by :name',
        ],
        'bid_action' => [
            'place_bid' => 'Place Your Bid',
            'login_to_bid' => 'to place a bid on this auction.',
            'login_link' => 'Login',
        ],
    ],
];
