<?php

/**
 * @author Luis Torres
 */

namespace App\Utilities;

use App\Interfaces\PhraseDisplay;
use Exception;

class PhraseChuckNorrisDisplay implements PhraseDisplay
{
    public function getPhrase(): string
    {
        try {
            $response = file_get_contents('https://api.chucknorris.io/jokes/random');

            if (! $response) {
                return 'Could not fetch Chuck Norris joke at this time.';
            }

            $data = json_decode($response, true);
            if (isset($data['value'])) {
                return $data['value'];
            }

            return 'Chuck Norris is so powerful, even his jokes are classified.';

        } catch (Exception $e) {
            return 'Error: Could not retrieve API data.';
        }
    }
}
