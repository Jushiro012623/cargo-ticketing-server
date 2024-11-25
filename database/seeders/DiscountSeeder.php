<?php

namespace Database\Seeders;

use App\Models\Discount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $discounts = [
            ['name' => 'REGULAR', 'percentage' => 0, 'description' => '0%'],
            ['name' => 'PWD/SENIOR', 'percentage' => .20, 'description' => '20%'],
            ['name' => 'HALF FARE', 'percentage' => .50, 'description' => '50%'],
            ['name' => 'MINOR', 'percentage' => .30, 'description' => '30%'],
            ['name' => 'STUDENT', 'percentage' => .20, 'description' => '20%'],
        ];
        foreach ($discounts as $discount) {
            Discount::factory()->create($discount);
        }
    }
}
