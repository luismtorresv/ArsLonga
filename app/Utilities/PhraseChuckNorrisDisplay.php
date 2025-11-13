<?php

/**
 * @author Luis Torres
 */

namespace App\Utilities;

use App\Interfaces\PhraseDisplay;
use Exception;
use Illuminate\Support\Facades\Http;

class PhraseChuckNorrisDisplay implements PhraseDisplay
{
    public function getPhrase(): string
    {
        try {
            $response = Http::connectTimeout(5)
                ->timeout(10)
                ->get('https://api.chucknorris.io/jokes/random');

            if ($response->failed()) {
                return 'Could not fetch Chuck Norris joke at this time.';
            }

            $quote = $response->json(key: 'value',
                default: 'Chuck Norris is so powerful, even his jokes are classified.'
            );

            return $quote;
        } catch (Exception $e) {
            return 'Error: Could not retrieve API data.';
        }
    }
}
