<?php

/**
 * @author Wendysita
 */

namespace App\Http\Controllers\Language;

use App\Http\Controllers\Controller;
use App\Utilities\LanguageManager;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cookie;

class LanguageController extends Controller
{
    private const COOKIE_DURATION = 10080; // 1 week in minutes

    public function change(string $language): RedirectResponse
    {
        if (! LanguageManager::isValidLanguage($language)) {
            return back();
        }

        Cookie::queue(LanguageManager::COOKIE_NAME, $language, self::COOKIE_DURATION);

        return back();
    }
}
