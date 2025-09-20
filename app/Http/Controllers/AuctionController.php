<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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

        $viewData['auction'] = $auction;

        return view('auction.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        return view('auction.create');
    }

    public function save(Request $request): RedirectResponse
    {
        Auction::validate($request);
        Auction::create($request->only(['original_price', 'final_price', 'winning_bidder_id', 'artwork_id']));

        return back();
    }
}
