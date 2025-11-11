<?php

namespace App\Providers;

use App\Interfaces\PhraseDisplay;
use App\Utilities\PhraseChuckNorrisDisplay;
use App\Utilities\PhraseLocalDisplay;
use Illuminate\Support\ServiceProvider;
use ValueError;

class PhraseServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(PhraseDisplay::class, function ($app, $params) {
            $phraseChoice = $params['phraseChoice'] ?? null;
            if (! $phraseChoice) {
                throw new ValueError('Phrase choice is required');
            }

            switch ($phraseChoice) {
                case 'chuck':
                    return new PhraseChuckNorrisDisplay;
                case 'local':
                    return new PhraseLocalDisplay;
                default:
                    throw new ValueError('Invalid phrase choice');
            }
        });

    }
}
