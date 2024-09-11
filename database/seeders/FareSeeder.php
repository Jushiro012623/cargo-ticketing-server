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
            ['additional_fee' => 'economy' ,'discount' => 'normal','origin' => 'San Jose' , 'destination' => 'Semirara', 'type_id' => 1,'fare' => '500',  'transportation_type' => 'out'],
            ['additional_fee' => 'economy' ,'discount' => 'normal','origin' => 'San Jose' , 'destination' => 'Caluya', 'type_id' => 1,'fare' => '750', 'transportation_type' => 'out'],
            ['additional_fee' => 'economy' ,'discount' => 'normal','origin' => 'San Jose' , 'destination' => 'Libertad', 'type_id' => 1,'fare' => '1060', 'transportation_type' => 'out'],
            ['additional_fee' => 'economy' ,'discount' => 'normal','origin' => 'Caluya' , 'destination' => 'Libertad', 'type_id' => 1,'fare' => '700', 'transportation_type' => 'in'],
            ['additional_fee' => 'economy' ,'discount' => 'normal','origin' => 'Semirara' , 'destination' => 'Caluya', 'type_id' => 1,'fare' => '375', 'transportation_type' => 'in'],
            ['additional_fee' => 'economy' ,'discount' => 'normal','origin' => 'Semirara' , 'destination' => 'Libertad', 'type_id' => 1,'fare' => '900', 'transportation_type' => 'in'],
        ];
        foreach ($fares as $fare) {
            Fare::factory()->create($fare);
        }
    }
}

