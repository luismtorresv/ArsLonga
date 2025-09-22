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
        $viewData['Auctions'] = Auction::all();

        return view('auction.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $auction = Auction::findOrFail($id);
        $artwork_price = $auction->getArtwork()->getPrice();

        $viewData['auction'] = $auction;
        $viewData['original_price'] = $artwork_price;

        return view('auction.show')->with('viewData', $viewData);
    }
}
