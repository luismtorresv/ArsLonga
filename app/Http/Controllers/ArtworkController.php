<?php

/**
 * @author Luis Torres
 */

namespace App\Http\Controllers;

use App\Models\Artwork;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ArtworkController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = __('List of artworks');
        $viewData['artworks'] = Artwork::all();

        return view('artwork.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        $viewData = [];

        $artwork = Artwork::findOrFail($id);

        $viewData['title'] = $artwork->getTitle().' - '.__('Artwork information');
        $viewData['artwork'] = $artwork;

        return view('artwork.show')->with('viewData', $viewData);
    }
}
