<?php

namespace App\Utilities;

use Illuminate\Support\Facades\Cookie;

class LanguageManager
{
    private const SUPPORTED_LANGUAGES = ['en', 'es'];

    private const COOKIE_NAME = 'app_language';

    private const COOKIE_DURATION = 10080; // 1 week in minutes

    public static function getCurrentLanguage(): string
    {
        // Priority: Cookie > App default ;)
        $cookieLanguage = request()->cookie(self::COOKIE_NAME);
        if ($cookieLanguage && self::isValidLanguage($cookieLanguage)) {
            return $cookieLanguage;
        }

        return config('app.fallback_locale');
    }

    public static function setLanguage(string $language): void
    {
        if (! self::isValidLanguage($language)) {
            $language = config('app.fallback_locale');
        }

        app()->setLocale($language);
        Cookie::queue(self::COOKIE_NAME, $language, self::COOKIE_DURATION);
    }

    public static function getSupportedLanguages(): array
    {
        return self::SUPPORTED_LANGUAGES;
    }

    public static function isValidLanguage(string $language): bool
    {
        return in_array($language, self::SUPPORTED_LANGUAGES);
    }

    public static function getLanguageName(string $code): string
    {
        return match ($code) {
            'en' => 'English',
            'es' => 'Español',
            default => $code,
        };
    }
}
