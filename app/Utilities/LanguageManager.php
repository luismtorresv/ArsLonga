<?php

namespace App\Utilities;

class LanguageManager
{
    private const SUPPORTED_LANGUAGES = ['en', 'es'];

    private const COOKIE_NAME = 'app_language';

    public static function getCurrentLanguage(): string
    {
        // Priority: Cookie > App default ;)
        $cookieLanguage = request()->cookie(self::COOKIE_NAME);
        if ($cookieLanguage && self::isValidLanguage($cookieLanguage)) {
            return $cookieLanguage;
        }

        return config('app.fallback_locale');
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

    public static function getLanguageNames(): array
    {
        $names = [];
        foreach (self::SUPPORTED_LANGUAGES as $lang) {
            $names[$lang] = self::getLanguageName($lang);
        }

        return $names;
    }
}
