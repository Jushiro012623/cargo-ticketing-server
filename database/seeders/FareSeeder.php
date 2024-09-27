<?php

namespace Database\Seeders;

use App\Models\Fare;
use App\Models\Route;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fares = [
            ['additional_fee' => 'economy', 'discount' => 'normal', 'fare' => '500', 'type_id' => 1,],
            ['additional_fee' => 'economy', 'discount' => 'normal', 'type_id' => 1, 'fare' => '750',],
            ['additional_fee' => 'economy', 'discount' => 'normal', 'type_id' => 1, 'fare' => '1060',],
            ['additional_fee' => 'economy', 'discount' => 'normal', 'type_id' => 1, 'fare' => '700',],
            ['additional_fee' => 'economy', 'discount' => 'normal', 'type_id' => 1, 'fare' => '375',],
            ['additional_fee' => 'economy', 'discount' => 'normal', 'type_id' => 1, 'fare' => '900',],
        ];
        foreach ($fares as $fare) {
            Fare::factory()->create($fare);
        }
    }
}
