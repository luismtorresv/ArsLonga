<?php

namespace Database\Seeders;

use App\Models\Artwork;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Artwork::factory(5)->create();
    }
}
