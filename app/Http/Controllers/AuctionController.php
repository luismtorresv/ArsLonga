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
        $viewData['auctions'] = Auction::with('artwork')->get();

        return view('auction.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        $viewData = [];
        $auction = Auction::findOrFail($id);
        $artwork = $auction->getArtwork();

        $viewData['auction'] = $auction;
        $viewData['original_price'] = $artwork->getPrice();

        $artworks = session('artworks', []);
        Artwork::findOrFail($id);

        if (! isset($artworks[$id])) {
            $artworks[$id] = 1;
            session(['artworks' => $artworks]);
        }

        return view('auction.show')->with('viewData', $viewData);
    }
}
