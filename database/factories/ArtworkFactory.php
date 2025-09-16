<?php

/**
 * @author Luis Torres
 */

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArtworkFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->randomElement([
                'Salvator Mundi', 'Interchange', 'The Card Players',
                'Nafea Faa Ipoipo (When Will You Marry?)', 'Number 17A',
                'Wasserschlangen II', 'No. 6 (Violet, Green and Red)',
                'Pendant portraits of Maerten Soolmans and Oopjen Coppit',
                'Les Femmes d\'Alger ("Version O")', 'The Standard Bearer',
                'Shot Sage Blue Marilyn', 'Nu couché', 'No. 5, 1948',
                'Woman III', 'Masterpiece', 'Portrait of Adele Bloch-Bauer I',
                'Le Rêve', 'Portrait of Dr. Gachet',
                'Portrait of Adele Bloch-Bauer II',
            ]),
            'author' => $this->faker->randomElement([
                'Peter Agostini', 'Lucien den Arend', 'Karl Bitter',
                'Percival Ball', 'Michael Boroniec', 'Hans Van de Bokenvamp',
                'Jacob Burck', 'Estella Campavias', 'Nancy Carline',
                'Bartolomeo Cavaceppi', 'Thomas Hart Benton', 'Fernando Botero',
                'Clarence Holbrook Carter', 'Charles Conder', 'Sonia Delaunay',
                'Elizabeth Durack', 'M. C. Escher', 'Joaquín Torres García',
                'Natalia Goncharova', 'Nina Genke-Meller', 'Elaine Hamilton',
                'Friedensreich Hundertwasser', 'František Kupka', 'László Moholy-Nagy',
            ]),
            'keyword' => $this->faker->word(),
            'category' => $this->faker->randomElement([
                'Painting', 'Sculpture', 'Photography', 'Digital', 'Drawing',
            ]),
            'details' => $this->faker->text(maxNbChars: 200),
            'image' => 'default.png',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
