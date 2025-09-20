<?php

namespace Database\Seeders;

use App\Models\Artwork;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\UniqueConstraintViolationException;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        try {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
        } catch (UniqueConstraintViolationException) {
            $this->command->alert('Skipping creation of Test User.');
        }

        Artwork::factory(5)->create();
    }
}
