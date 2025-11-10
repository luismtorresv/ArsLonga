<?php

/**
 * @author Luis Torres
 */

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArtworkFactory extends Factory
{
    /**
     * Compute a realistic, round number price for the `Artwork`.
     */
    private function getRandomPrice(): int
    {
        $baseAmount = 100_000;
        $maxPrice = 5_000_000;
        $maxMultiplier = $maxPrice / $baseAmount;

        $multiplier = $this->faker->numberBetween(1, $maxMultiplier);

        // Price is a multiple of a round number.
        $price = $baseAmount * $multiplier;

        return $price;
    }

    public function definition(): array
    {
        return [
            'title' => $this->faker->text(maxNbChars: 40),
            'author' => $this->faker->name(),
            'keyword' => $this->faker->word(),
            'category' => $this->faker->randomElement([
                'Painting', 'Sculpture', 'Photography', 'Digital', 'Drawing',
            ]),
            'price' => $this->getRandomPrice(),
            'details' => $this->faker->text(maxNbChars: 200),
            'image' => 'default.png',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
