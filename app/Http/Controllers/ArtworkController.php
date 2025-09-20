<?php

/**
 * @author Luis Torres
 */

namespace App\Http\Controllers;

use App\Models\Artwork;
use Illuminate\View\View;

class ArtworkController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = __('artwork.title.index');
        $viewData['artworks'] = Artwork::all();

        return view('artwork.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];

        $artwork = Artwork::findOrFail($id);

        $viewData['title'] = __('artwork.title.show', ['artworkTitle' => $artwork->getTitle()]);
        $viewData['artwork'] = $artwork;

        return view('artwork.show')->with('viewData', $viewData);
    }
}
