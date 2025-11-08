<?php

/**
 * @author Wendysita
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artwork;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AdminArtworkController extends Controller
{
    public function index(Request $request): View
    {
        $sort = $request->get('sort', '');
        $query = Artwork::query();

        if ($sort === 'price_desc') {
            $query->orderBy('price', 'desc');
        } elseif ($sort === 'price_asc') {
            $query->orderBy('price', 'asc');
        }

        $artworks = $query->get();

        $viewData = [];
        $viewData['artworks'] = $artworks;
        $viewData['artworksCount'] = $artworks->count();
        $viewData['sort'] = $sort;

        return view('admin.artwork.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        $viewData = [];

        $artwork = Artwork::findOrFail($id);

        $viewData['artwork'] = $artwork;

        return view('admin.artwork.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];

        return view('admin.artwork.create')->with('viewData', $viewData);
    }

    public function save(Request $request, ?int $id = null): RedirectResponse
    {
        try {
            Artwork::validate($request);
        } catch (ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        }

        $artwork = $id ? Artwork::findOrFail($id) : new Artwork;

        $artwork->setTitle($request->input('title'));
        $artwork->setAuthor($request->input('author'));
        $artwork->setKeyword($request->input('keyword'));
        $artwork->setCategory($request->input('category'));
        $artwork->setPrice((int) $request->input('price'));
        $artwork->setDetails($request->input('details'));

        $artwork->storeImageOnDisk($request, $id);
        $artwork->save();

        return $id
            ? redirect()->route('admin.artwork.show', $id)
            : redirect()->route('admin.artwork.createSuccess');
    }

    public function createSuccess(): View
    {
        $viewData = [];

        return view('admin.artwork.createSuccess')->with('viewData', $viewData);
    }

    public function delete(int $id): RedirectResponse
    {
        $artwork = Artwork::findOrFail($id);

        $artwork->deleteImageFromDisk();

        return redirect()->route('admin.artwork.index');
    }

    public function edit(int $id): View
    {
        $artwork = Artwork::findOrFail($id);
        $viewData = [];
        $viewData['artwork'] = $artwork;

        return view('admin.artwork.edit')->with('viewData', $viewData);
    }
}
