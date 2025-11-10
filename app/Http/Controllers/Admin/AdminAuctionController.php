<?php

/**
 * @author Wendysita
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminStoreAuctionRequest;
use App\Models\Artwork;
use App\Models\Auction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminAuctionController extends Controller
{
    public function index(Request $request): View
    {
        $sort = $request->get('sort', '');
        $query = Auction::query();

        if ($sort === 'start_date_desc') {
            $query->orderBy('start_date', 'desc');
        } elseif ($sort === 'start_date_asc') {
            $query->orderBy('start_date', 'asc');
        }

        $auctions = $query->get();

        $viewData = [];
        $viewData['auctions'] = $auctions;
        $viewData['auctionsCount'] = $auctions->count();
        $viewData['sort'] = $sort;

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

    public function save(AdminStoreAuctionRequest $request, ?int $id = null): RedirectResponse
    {
        $exists = Auction::where('artwork_id', $request->input('artwork_id'))
            ->when($id, fn ($q) => $q->where('id', '!=', $id))
            ->exists();

        if ($exists) {
            return redirect()->back()
                ->withErrors(['artwork_id' => __('admin.artworkAlready')])
                ->withInput();
        }

        $auction = $id ? Auction::findOrFail($id) : new Auction;

        $auction->setArtworkId($request->integer('artwork_id'));
        $auction->setStartDate($request->date('start_date'));
        $auction->setFinalDate($request->date('final_date'));

        if ($request->filled('winning_bidder_id')) {
            $auction->setWinningBidderId($request->integer('winning_bidder_id'));
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
