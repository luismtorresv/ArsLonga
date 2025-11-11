<?php

/**
 * @author Jeronimo Acosta
 */

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Bid;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BidController extends Controller
{
    public function create(Request $request, int $auction_id): RedirectResponse
    {
        $auction = Auction::findOrFail($auction_id);

        // Check if auction has started
        if (! $auction->hasStarted()) {
            return redirect()
                ->route('auction.show', ['id' => $auction_id])
                ->withErrors(['auction' => __('bid.errors.not_started')]);
        }

        // Check if auction has ended
        if ($auction->hasEnded()) {
            return redirect()
                ->route('auction.show', ['id' => $auction_id])
                ->withErrors(['auction' => __('bid.errors.ended')]);
        }

        // Check if auction already has a winner
        if ($auction->winning_bidder) {
            return redirect()
                ->route('auction.show', ['id' => $auction_id])
                ->withErrors(['auction' => __('bid.errors.has_winner')]);
        }

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
