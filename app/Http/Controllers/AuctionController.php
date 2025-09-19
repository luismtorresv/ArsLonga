<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Auction;

class AuctionController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['Auctions'] = Auction::all();

        return view('auction.index')->with('viewData', $viewData);
    }

    public function show(): View
    {
        return view('auction.show');
    }

    public function create(): View
    {
        return view('auction.create');
    }

    public function save(Request $request): RedirectResponse
    {
        Auction::validate($request);
        Auction::create($request->only(['price', 'winning_bidder_id']));

        return back();
    }
}