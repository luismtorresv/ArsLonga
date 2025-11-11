<?php

/**
 * @author Jeronimo Acosta
 */

namespace App\Http\Controllers;

use App\Models\Bid;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BidController extends Controller
{
    public function create(Request $request, int $auction_id): RedirectResponse
    {
        Bid::validate($request);

        Bid::create([
            'price_offering' => $request->integer('price_offering'),
            'user_id' => auth()->id(),
            'auction_id' => $auction_id,
        ]);

        return redirect()
            ->route('auction.show', ['id' => $auction_id])
            ->with('success', __('bid.create.success'));
    }
}
