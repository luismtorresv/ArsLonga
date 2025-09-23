<?php

/**
 * @author Jeronimo Acosta
 */

namespace App\Http\Controllers;

use App\Models\Bid;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BidController extends Controller
{
    public function create(int $auction_id): View
    {
        $viewData = [];

        $viewData['auction_id'] = $auction_id;

        return view('bid.create')->with('viewData', $viewData);
    }

    public function save(request $request): RedirectResponse
    {
        $user_id = auth()->id();

        Bid::validate($request);
        Bid::create([
            'price_offering' => $request->input('price_offering'),
            'user_id' => $user_id,
            'auction_id' => $request->input('auction_id'),
        ]);

        return back();
    }
}
