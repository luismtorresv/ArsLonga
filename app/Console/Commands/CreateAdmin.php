<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an admin user with email admin@example.com and password admin.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Disable mass assignment protection while we create the admin.
        User::unguard();

        User::updateOrCreate(
            ['name' => 'Admin'],
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('admin'),
                'role' => 'admin',
                'balance' => 100_000_000,
            ]);

        // Re-enable mass assignment protection.
        User::reguard();
    }
}
