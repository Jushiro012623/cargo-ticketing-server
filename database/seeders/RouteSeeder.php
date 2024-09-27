<?php

namespace Database\Seeders;

use App\Models\Route;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $routes = [
            ['origin' => 'San Jose', 'destination' => 'Semirara', 'transportation_type' => 'out'],
            [
                'origin' => 'San Jose',
                'destination' => 'Caluya',
                'transportation_type' => 'out'
            ],
            [
                'origin' => 'San Jose',
                'destination' => 'Libertad',
                'transportation_type' => 'out'
            ],
            [
                'origin' => 'Caluya',
                'destination' => 'Libertad',
                'transportation_type' => 'in'
            ],
            [
                'origin' => 'Semirara',
                'destination' => 'Caluya',
                'transportation_type' => 'in'
            ],
            [
                'origin' => 'Semirara',
                'destination' => 'Libertad',
                'transportation_type' => 'in'
            ]


        ];
        foreach ($routes as $route) {
            Route::factory()->create($route);
        }
    }
}
