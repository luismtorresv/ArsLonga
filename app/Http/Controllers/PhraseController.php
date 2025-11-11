<?php

namespace App\Http\Controllers;

use App\Interfaces\PhraseDisplay;
use Illuminate\View\View;

class PhraseController extends Controller
{
    public function index(): View
    {
        return view('phrase.index');
    }

    public function show(string $type): View
    {
        $phraseDisplayInterface = app(PhraseDisplay::class, ['phraseChoice' => $type]);
        $phrase = $phraseDisplayInterface->getPhrase();

        $viewData = [];
        $viewData['phrase'] = $phrase;
        $viewData['type'] = $type;

        return view('phrase.show')->with('viewData', $viewData);
    }
}
