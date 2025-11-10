<?php

/**
 * @author Wendysita
 */

namespace App\Http\Controllers\Language;

use App\Http\Controllers\Controller;
use App\Utilities\LanguageManager;
use Illuminate\Http\RedirectResponse;

class LanguageController extends Controller
{
    public function change(string $language): RedirectResponse
    {
        if (! LanguageManager::isValidLanguage($language)) {
            return back();
        }

        LanguageManager::setLanguage($language);

        return back();
    }
}
