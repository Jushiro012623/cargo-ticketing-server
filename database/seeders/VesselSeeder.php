<?php

namespace Database\Seeders;

use App\Models\Vessel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VesselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vessels = [
            [
                'name' => 'ARGO 1',
                'description' => 'Passenger Ferry',
            ],
            [
                'name' => 'ARGO 2',
                'description' => 'Cargo Vessel',
            ],
            [
                'name' => 'SUDA',
                'description' => 'Roll-On/Roll-Off',
            ],


        ];
        foreach ($vessels as $vessel) {
            Vessel::factory()->create($vessel);
        }
    }
}
