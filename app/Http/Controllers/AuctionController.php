<?php

/**
 * @author Jeronimo Acosta
 */

namespace App\Http\Controllers;

use App\Models\Auction;
use Illuminate\View\View;

class AuctionController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['Auctions'] = Auction::with('bids.user')->get();

        return view('auction.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $auction = Auction::findOrFail($id);

        $viewData['auction'] = $auction;
        $artwork = $auction->getArtwork();
        $viewData['original_price'] = $artwork->getPrice();

        return view('auction.show')->with('viewData', $viewData);
    }
}
