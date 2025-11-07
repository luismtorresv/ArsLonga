<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $user = Auth::user();

        $total = 0;
        $artworksInCart = [];

        $artworksInSession = session('artworks', []);
        if ($artworksInSession) {
            $artworksInCart = Artwork::findMany(array_keys($artworksInSession));
            foreach ($artworksInCart as $artwork) {
                $total += $artwork->getPrice() * $artworksInSession[$artwork->getId()];
            }
        }

        $viewData['artworks'] = $artworksInCart;
        $viewData['total'] = $total;
        $viewData['userBalance'] = $user->getBalance();

        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(int $id): RedirectResponse
    {
        $artworks = session('artworks', []);
        Artwork::findOrFail($id);

        if (! isset($artworks[$id])) {
            $artworks[$id] = 1;
            session(['artworks' => $artworks]);
        }

        return redirect()->route('cart.index');
    }

    public function remove(int $id): RedirectResponse
    {
        Artwork::findOrFail($id);

        $artworks = session('artworks', []);
        unset($artworks[$id]);
        session(['artworks' => $artworks]);

        return redirect()->route('cart.index');
    }

    public function purchase(Request $request): View|RedirectResponse
    {
        $artworksInSession = session('artworks');

        if (! $artworksInSession) {
            return redirect()->route('cart.index');
        }

        $user = Auth::user();

        $order = new Order;
        $order->setUserId($user->getId());
        $order->setTotal(0);
        $order->save();

        $total = 0;
        $artworksInCart = Artwork::findMany(array_keys($artworksInSession));

        foreach ($artworksInCart as $artwork) {
            $item = new Item;
            $item->setPrice($artwork->getPrice());
            $item->setArtworkId($artwork->getId());
            $item->setOrderId($order->getId());

            $item->save();
            $total += $artwork->getPrice();
        }

        if ($user->getBalance() < $total) {
            return redirect()->back()->with('error', __('Insufficient balance'));
        }

        $order->setTotal($total);
        $order->save();

        $user->substractFromBalance($total);
        $user->save();

        $request->session()->forget('artworks');

        $viewData = [];
        $viewData['order'] = $order;

        return view('cart.purchase')->with('viewData', $viewData);
    }
}
