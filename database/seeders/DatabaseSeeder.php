<?php

namespace Database\Seeders;

use App\Models\Artwork;
use App\Models\Auction;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Artwork::factory(5)->create();

        Auction::factory(5)->create(); // This will create more Artworks.
    }
}
