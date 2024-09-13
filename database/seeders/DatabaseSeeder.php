<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    { 
        $this->call([
            // FareSeeder::class,
            RouteSeeder::class,
        ]);
        // User::factory(10)->create();



        User::factory()->create([
            'name' => 'Test User',
            'contact' => '09125279754',
            'role' => 'user_admin',
            'status' => 'active',
            'address' => 'Tondo, Manila, Metro-Manila',
            'email' => 'test@example.com',
        ]);
    }
}
