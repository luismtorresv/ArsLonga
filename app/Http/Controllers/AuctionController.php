<?php

/**
 * @author Jeronimo Acosta
 */

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\Auction;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuctionController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['auctions'] = Auction::with('bids.user')->get();

        return view('auction.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        $viewData = [];
        $auction = Auction::findOrFail($id);

        $viewData['auction'] = $auction;
        $artwork = $auction->getArtwork();
        $viewData['original_price'] = $artwork->getPrice();

        $hasEnded = $auction->assignWinner();
        if (! $hasEnded) {
            return view('auction.show')->with('viewData', $viewData);
        }

        $artworks = session('artworks', []);
        Artwork::findOrFail($id);

        if (! isset($artworks[$id])) {
            $artworks[$id] = 1;
            session(['artworks' => $artworks]);
        }

        return redirect()->route('cart.index');
    }
}
