<?php

/**
 * @author Jeronimo Acosta
 */

namespace App\Http\Controllers;

use app\Models\Bid;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BidController extends Controller
{
    public function create(): View
    {
        return view('bid.create');
    }

    public function save(request $request): RedirectResponse
    {
        Bid::validate($request);
        Bid::create($request->only(['price_offering', 'user_id', 'auction_id']));

        return back();
    }
}
