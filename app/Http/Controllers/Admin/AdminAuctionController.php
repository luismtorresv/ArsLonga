<?php

/**
 * @author Wendysita
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artwork;
use App\Models\Auction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AdminAuctionController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['auctions'] = Auction::all();
        $viewData['auctionsCount'] = $viewData['auctions']->count();

        return view('admin.auction.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $auction = Auction::findOrFail($id);

        $viewData['auction'] = $auction;
        $artwork = $auction->getArtwork();
        $viewData['original_price'] = $artwork->getPrice();

        return view('admin.auction.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $artworks = Artwork::all();

        return view('admin.auction.create', compact('artworks'));
    }

    public function save(Request $request, ?int $id = null): RedirectResponse
    {
        try {
            Auction::validate($request);
        } catch (ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        }

        $auction = $id ? Auction::findOrFail($id) : new Auction;

        $auction->setPriceLimit((int) $request->input('price_limit'));
        $auction->setArtworkId((int) $request->input('artwork_id'));

        if ($request->filled('winning_bidder_id')) {
            $auction->setWinningBidderUserId((int) $request->input('winning_bidder_id'));
        }

        $auction->save();

        return $id
            ? redirect()->route('admin.auction.show', $id)
            : redirect()->route('admin.auction.createSuccess');
    }

    public function createSuccess(): View
    {
        $viewData = [];

        return view('admin.auction.createSuccess')->with('viewData', $viewData);
    }

    public function delete(int $id): RedirectResponse
    {
        $auction = auction::findOrFail($id);
        $auction->delete();

        return redirect()->route('admin.auction.index');
    }

    public function edit(int $id): View
    {
        $auction = Auction::findOrFail($id);
        $artworks = Artwork::all();

        $viewData = [];
        $viewData['auction'] = $auction;
        $viewData['artworks'] = $artworks;

        return view('admin.auction.edit')->with('viewData', $viewData);
    }
}
