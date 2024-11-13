<?php

namespace Database\Seeders;

use App\Models\PaymentMethods;
use App\Models\Role;
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
            FareSeeder::class,
            RouteSeeder::class,
            VesselSeeder::class,
            DiscountSeeder::class,
        ]);
        
        Role::factory()->create([
            'name' => 'user',
            'label' => 'User'
        ]);
        Role::factory()->create([
            'name' => 'manager',
            'label' => 'Manager'
        ]);
        Role::factory()->create([
            'name' => 'admin',
            'label' => 'Admin'
        ]);
        // User::factory(10)->create();
        User::factory()->create([
            'name' => 'Test User',
            'contact' => '09125279754',
            'user_role_id' => 1,
            'status' => 'active',
            'address' => 'Tondo, Manila, Metro-Manila',
            'email' => 'user@example.com',
        ]);
        User::factory()->create([
            'name' => 'Test Admin',
            'contact' => '123123123123',
            'user_role_id' => 2,
            'status' => 'active',
            'address' => 'Tondo, Manila, Metro-Manila',
            'email' => 'admin@example.com',
        ]);
        User::factory()->create([
            'name' => 'Test Manager',
            'contact' => '123123123123',
            'user_role_id' => 3,
            'status' => 'active',
            'address' => 'Tondo, Manila, Metro-Manila',
            'email' => 'manager@example.com',
        ]);
        PaymentMethods::factory()->create([
            'name' => 'VSPayLater',
        ]);
        PaymentMethods::factory()->create([
            'name' => 'Debit/Credit Card',
        ]);
        PaymentMethods::factory()->create([
            'name' => 'Cash',
        ]);
        PaymentMethods::factory()->create([
            'name' => 'E-Money',
        ]);


        
    }
}
