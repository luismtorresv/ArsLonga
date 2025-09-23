<?php

/**
 * @author Wendysita
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $auction = $auction->getauction();
        $viewData['original_price'] = $auction->getPrice();

        return view('admin.auction.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];

        return view('admin.auction.create')->with('viewData', $viewData);
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

        $auction->setTitle($request->input('title'));
        $auction->setAuthor($request->input('author'));
        $auction->setKeyword($request->input('keyword'));
        $auction->setCategory($request->input('category'));
        $auction->setDetails($request->input('details'));

        if (! $id) {
            $auction->setImage('default.png');
        }

        $auction->save();

        if ($request->hasFile('image')) {
            $imageName = $auction->getId().'.'.$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $auction->setImage($imageName);
            $auction->save();
        }

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

        if ($auction->getImage() !== 'default.png') {
            Storage::disk('public')->delete($auction->getImage());
        }
        $auction->delete();

        return redirect()->route('admin.auction.index');
    }

    public function edit(int $id): View
    {
        $auction = auction::findOrFail($id);
        $viewData = [];
        $viewData['auction'] = $auction;

        return view('admin.auction.edit')->with('viewData', $viewData);
    }
}
