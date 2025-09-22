<?php

namespace App\Http\Controllers\Admin;

use App\Models\Artwork;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller; 
use Illuminate\View\View;

class AdminArtworkController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $artworks = Artwork::all();
        $viewData['artworks'] = $artworks;
        $viewData['artworksCount'] = $artworks->count();

        return view('admin.artwork.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        $viewData = [];

        $artwork = Artwork::findOrFail($id);

        $viewData['title'] = $artwork->getTitle();
        $viewData['subtitle'] = $artwork->getTitle().' - Artwork information';
        $viewData['artwork'] = $artwork;

        return view('admin.artwork.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        return view('admin.artwork.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        try {
            Artwork::validate($request);
        } catch (ValidationException $e) {
            return redirect()->route('admin.artwork.create')
                ->withErrors($e->validator)
                ->withInput();
        }

        $newArtwork = new Artwork;
        $newArtwork->setTitle($request->input('title'));
        $newArtwork->setAuthor($request->input('author'));
        $newArtwork->setKeyword($request->input('keyword'));
        $newArtwork->setCategory($request->input('category'));
        $newArtwork->setDetails($request->input('details'));
        $newArtwork->setImage('default.png');
        $newArtwork->save();

        if ($request->hasFile('image')) {
            $imageName = $newArtwork->getId().'.'.$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $newArtwork->setImage($imageName);
            $newArtwork->save();
        }

        return redirect()->route('admin.artwork.createSuccess');
    }

    public function createSuccess(): View
    {
        $viewData = [];

        return view('admin.artwork.createSuccess')->with('viewData', $viewData);
    }

    public function delete(int $id): RedirectResponse
    {
        $artwork = Artwork::findOrFail($id);

        if ($artwork->getImage() !== 'default.png') {
            Storage::disk('public')->delete($artwork->getImage());
        }
        $artwork->delete();

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