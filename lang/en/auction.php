<?php

/**
 * @author Jeronimo Acosta
 */

return [
    'index' => [
        'no_auctions' => 'No auctions available at the moment.',
        'auction_number' => 'Auction #:id',
        'artwork' => 'Artwork: :title',
    ],
    'show' => [
        'auction_title' => 'Auction #:id',
        'original_price' => 'Original Price: $:amount',
        'artwork_details' => 'Artwork Details',
        'title' => 'Title: :title',
        'author' => 'Author: :author',
        'category' => 'Category: :category',
        'winning_bidder' => 'Winning Bidder',
        'user_id' => 'User ID: :id',
        'user_name' => 'Username: :name',
        'auction_id' => 'Auction ID: :id',
        'created' => 'Created: :date',
        'timeline' => [
            'title' => 'Auction Timeline',
            'starts' => 'Starts',
            'ends' => 'Ends',
        ],
        'status' => [
            'won' => 'Won',
            'active' => 'Live Auction',
            'not_started' => 'Auction has not started yet',
            'ended' => 'Auction has ended',
        ],
        'countdown' => [
            'starts_in' => 'Starts in',
            'ends_in' => 'Ends in',
            'ended' => 'Ended',
            'remaining' => 'remaining',
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
            'not_started' => 'Bidding will open when the auction starts.',
            'ended' => 'This auction has ended. Bidding is closed.',
        ],
    ],
];
