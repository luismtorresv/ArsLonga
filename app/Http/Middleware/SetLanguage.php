<?php

namespace App\Http\Middleware;

use App\Utilities\LanguageManager;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLanguage
{
    public function handle(Request $request, Closure $next): Response
    {
        $language = LanguageManager::getCurrentLanguage();
        app()->setLocale($language);

        // Share language options with all views
        $supportedLanguages = LanguageManager::getSupportedLanguages();
        $languageNames = [];

        foreach ($supportedLanguages as $lang) {
            $languageNames[$lang] = LanguageManager::getLanguageName($lang);
        }

        view()->share('supportedLanguages', $supportedLanguages);
        view()->share('languageNames', $languageNames);
        view()->share('currentLanguage', $language);

        return $next($request);
    }
}
