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

        view()->share('supportedLanguages', LanguageManager::getSupportedLanguages());
        view()->share('languageNames', LanguageManager::getLanguageNames());
        view()->share('currentLanguage', $language);

        return $next($request);
    }
}
