<?php

/**
 * @author Luis Torres
 */

namespace Database\Factories;

use App\Models\Artwork;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AuctionFactory extends Factory
{
    public function definition(): array
    {
        $start = $this->faker
            ->dateTimeBetween('-2 weeks', '+2 weeks');
        $final = Carbon::instance($start)
            ->addHours($this->faker->numberBetween(1, 24 * 7));

        return [
            'artwork_id' => Artwork::factory(),
            'start_date' => $start,
            'final_date' => $final,
            'winning_bidder_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
