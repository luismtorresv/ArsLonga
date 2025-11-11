<?php

/**
 * @author Luis Torres
 */

namespace App\Utilities;

use App\Interfaces\PhraseDisplay;

class PhraseLocalDisplay implements PhraseDisplay
{
    /**
     * PHRASE LOCAL DISPLAY ATTRIBUTES
     *
     * $this->quotes - array - contains an array of inspirational quotes
     */
    private array $quotes = [
        'The only way to do great work is to love what you do. - Steve Jobs',
        'Innovation distinguishes between a leader and a follower. - Steve Jobs',
        'Life is what happens to you while you\'re busy making other plans. - John Lennon',
        'The future belongs to those who believe in the beauty of their dreams. - Eleanor Roosevelt',
        'It is during our darkest moments that we must focus to see the light. - Aristotle',
        'Success is not final, failure is not fatal: it is the courage to continue that counts. - Winston Churchill',
        'The only impossible journey is the one you never begin. - Tony Robbins',
        'In the end, we will remember not the words of our enemies, but the silence of our friends. - Martin Luther King Jr.',
        'Art is not what you see, but what you make others see. - Edgar Degas',
        'Every artist was first an amateur. - Ralph Waldo Emerson',
        'Creativity takes courage. - Henri Matisse',
        'Art enables us to find ourselves and lose ourselves at the same time. - Thomas Merton',
        'The purpose of art is washing the dust of daily life off our souls. - Pablo Picasso',
        'Art is the most intense mode of individualism that the world has known. - Oscar Wilde',
        'Great art picks up where nature ends. - Marc Chagall',
    ];

    public function getPhrase(): string
    {
        if (empty($this->quotes)) {
            return 'No quotes available.';
        }

        $randomIndex = array_rand($this->quotes);

        return $this->quotes[$randomIndex];
    }
}
