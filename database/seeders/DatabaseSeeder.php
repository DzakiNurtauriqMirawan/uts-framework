<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\EventSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Run Event seeder 
        $this->call([
            EventSeeder::class,
        ]);
    }
}