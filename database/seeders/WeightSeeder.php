<?php

namespace Database\Seeders;

use App\Models\Weight;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lengths = [
            ['name' => '0.5 Meter'],
            ['name' => '1 Meter'],
            ['name' => '2 Meter'],
            ['name' => '1 - 3 Meter'],
            ['name' => '1 - 4 Meter'],
            ['name' => '1 - 5 Meter'],
            ['name' => '1 - 6 Meter'],
            ['name' => '1 - 7 Meter'],
            ['name' => '1 - 8 Meter'],
            ['name' => '1 - 8.9 Meter'],
            ['name' => '1 - 9.9 Meter'],
            ['name' => '1 - 10 Meter'],
            ['name' => '1 - 11 Meter'],
            ['name' => '1 - 12 Meter'],
            ['name' => '1 - 13 Meter'],
            ['name' => '1 - 14 Meter'],
            ['name' => '3 Tons'],
            ['name' => '3 - 10 Tons'],
            ['name' => '10 - 15 Tons'],
            ['name' => '15 - 20 Tons'],
            ['name' => '20 - 30 Tons'],
        ];
        foreach ($lengths as $length) {
            Weight::factory()->create($length);
        }
    }
}
