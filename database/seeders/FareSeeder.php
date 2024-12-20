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
            //passejger
            ['additional_fee' => 50, 'fare' => 500,  'type_id' => 1, 'route_id' => 1,],
            ['additional_fee' => 70, 'fare' => 750, 'type_id' => 1, 'route_id' => 2,],
            ['additional_fee' => 100, 'fare' => 1060,  'type_id' => 1, 'route_id' => 3,],
            ['additional_fee' => 50, 'fare' => 375,  'type_id' => 1, 'route_id' => 5,],
            ['additional_fee' => 70, 'fare' => 900,  'type_id' => 1, 'route_id' => 6,],
            ['additional_fee' => 50, 'fare' => 700,  'type_id' => 1, 'route_id' => 4,],

            
            ['additional_fee' => 0, 'fare' => 750, 'type_id' => 3, 'route_id' => 2,],
            ['additional_fee' => 0, 'fare' => 1060,  'type_id' => 3, 'route_id' => 3,],
            ['additional_fee' => 0, 'fare' => 375,  'type_id' => 3, 'route_id' => 5,],
            ['additional_fee' => 0, 'fare' => 900,  'type_id' => 3, 'route_id' => 6,],
            ['additional_fee' => 0, 'fare' => 700,  'type_id' => 3, 'route_id' => 4,],
            //bike
            ['additional_fee' => 0,'weight_id' => 1, 'fare' => 420, 'route_id' => 1,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 1, 'fare' => 600, 'route_id' => 2,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 1, 'fare' => 840, 'route_id' => 3,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 1, 'fare' => 350, 'route_id' => 5,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 1, 'fare' => 600, 'route_id' => 6,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 1, 'fare' => 450, 'route_id' => 4,'type_id' => 2],//bereak

            //sidecar
            ['additional_fee' => 0,'weight_id' => 2, 'fare' => 1200, 'route_id' => 1,'type_id' => 2 ],
            ['additional_fee' => 0,'weight_id' => 2, 'fare' => 1800, 'route_id' => 2,'type_id' => 2 ],
            ['additional_fee' => 0,'weight_id' => 2, 'fare' => 2400, 'route_id' => 3,'type_id' => 2 ],
            ['additional_fee' => 0,'weight_id' => 2, 'fare' => 540, 'route_id' => 5, 'type_id' => 2 ],
            ['additional_fee' => 0,'weight_id' => 2, 'fare' => 1800, 'route_id' => 6,'type_id' => 2 ],
            ['additional_fee' => 0,'weight_id' => 2, 'fare' => 1200, 'route_id' => 4,'type_id' => 2 ],//bereak

            //motor
            ['additional_fee' => 0,'weight_id' => 3, 'fare' => 1000, 'route_id' => 1,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 3, 'fare' => 3240, 'route_id' => 2,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 3, 'fare' => 5220, 'route_id' => 3,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 3, 'fare' => 1370, 'route_id' => 5,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 3, 'fare' => 3350, 'route_id' => 4,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 3, 'fare' => 1980, 'route_id' => 4,'type_id' => 2],//bereak

            ['additional_fee' => 0,'weight_id' => 4, 'fare' => 2400, 'route_id' => 1,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 4, 'fare' => 3600, 'route_id' => 2,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 4, 'fare' => 5400, 'route_id' => 3,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 4, 'fare' => 2100, 'route_id' => 5,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 4, 'fare' => 3600, 'route_id' => 6,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 4, 'fare' => 2400, 'route_id' => 4,'type_id' => 2],//bereak

            ['additional_fee' => 0,'weight_id' => 5, 'fare' => 5000, 'route_id' => 1,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 5, 'fare' => 9640, 'route_id' => 2,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 5, 'fare' => 13920, 'route_id' => 3,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 5, 'fare' => 3650, 'route_id' => 5,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 5, 'fare' => 8950, 'route_id' => 6,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 5, 'fare' => 5280, 'route_id' => 4,'type_id' => 2],//bereak
            ['additional_fee' => 0,'weight_id' => 6, 'fare' => 6500, 'route_id' => 1,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 6, 'fare' => 10800, 'route_id' => 2,'type_id' =>2],
            ['additional_fee' => 0,'weight_id' => 6, 'fare' => 17400, 'route_id' => 3,'type_id' =>2],
            ['additional_fee' => 0,'weight_id' => 6, 'fare' => 4560, 'route_id' => 5,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 6, 'fare' => 11160, 'route_id' => 6,'type_id' =>2],
            ['additional_fee' => 0,'weight_id' => 6, 'fare' => 6600, 'route_id' => 4,'type_id' => 2],//bereak
            ['additional_fee' => 0,'weight_id' => 7, 'fare' => 7500, 'route_id' => 1,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 7, 'fare' => 12960, 'route_id' => 2,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 7, 'fare' => 20880, 'route_id' => 3,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 7, 'fare' => 5480, 'route_id' => 5,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 7, 'fare' => 13400, 'route_id' => 6,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 7, 'fare' => 7920, 'route_id' => 4,'type_id' => 2],//bereak
            ['additional_fee' => 0,'weight_id' => 8, 'fare' => 8750, 'route_id' => 1, 'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 8, 'fare' => 15120, 'route_id' => 2,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 8, 'fare' => 24360, 'route_id' => 3,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 8, 'fare' => 6390, 'route_id' => 5,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 8, 'fare' => 15625, 'route_id' => 6,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 8, 'fare' => 9240, 'route_id' => 4,'type_id' => 2],//bereak
            ['additional_fee' => 0,'weight_id' => 9, 'fare' => 10000, 'route_id' => 1,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 9, 'fare' => 17280, 'route_id' => 2,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 9, 'fare' => 27840, 'route_id' => 3,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 9, 'fare' => 7300, 'route_id' => 5,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 9, 'fare' => 17860, 'route_id' => 6,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 9, 'fare' => 10560, 'route_id' => 4,'type_id' => 2],//bereak
            ['additional_fee' => 0,'weight_id' => 10, 'fare' => 14000, 'route_id' => 1,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 10, 'fare' => 24300, 'route_id' => 2,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 10, 'fare' => 39150, 'route_id' => 3,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 10, 'fare' => 10260, 'route_id' => 5,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 10, 'fare' => 25200, 'route_id' => 6,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 10, 'fare' => 14850, 'route_id' => 4,'type_id' => 2],//bereak
            ['additional_fee' => 0,'weight_id' => 11, 'fare' => 14820, 'route_id' => 1,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 11, 'fare' => 25650, 'route_id' => 2,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 11, 'fare' => 41326, 'route_id' => 3,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 11, 'fare' => 10830, 'route_id' => 5,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 11, 'fare' => 26500, 'route_id' => 6,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 11, 'fare' => 15700, 'route_id' => 4,'type_id' => 2], //bereak
            ['additional_fee' => 0,'weight_id' => 12, 'fare' => 15600, 'route_id' => 1,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 12, 'fare' => 27000, 'route_id' => 2,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 12, 'fare' => 43500, 'route_id' => 3,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 12, 'fare' => 11400, 'route_id' => 5,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 12, 'fare' => 27900, 'route_id' => 6,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 12, 'fare' => 16500, 'route_id' => 4,'type_id' => 2],//bereak
            ['additional_fee' => 0,'weight_id' => 13, 'fare' => 17160, 'route_id' => 1,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 13, 'fare' => 29700, 'route_id' => 2,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 13, 'fare' => 47850, 'route_id' => 3,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 13, 'fare' => 12540, 'route_id' => 5,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 13, 'fare' => 30690, 'route_id' => 6,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 13, 'fare' => 18150, 'route_id' => 4,'type_id' => 2],//bereak
            ['additional_fee' => 0,'weight_id' => 14, 'fare' => 18720, 'route_id' => 1,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 14, 'fare' => 32400, 'route_id' => 2,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 14, 'fare' => 52200, 'route_id' => 3,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 14, 'fare' => 13860, 'route_id' => 5,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 14, 'fare' => 33480, 'route_id' => 6,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 14, 'fare' => 19800, 'route_id' => 4,'type_id' => 2],//bereak
            ['additional_fee' => 0,'weight_id' => 15, 'fare' => 20280, 'route_id' => 1,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 15, 'fare' => 35100, 'route_id' => 2,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 15, 'fare' => 56550, 'route_id' => 3,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 15, 'fare' => 14820, 'route_id' => 5,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 15, 'fare' => 36270, 'route_id' => 6,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 15, 'fare' => 21450, 'route_id' => 4,'type_id' => 2],//bereak
            ['additional_fee' => 0,'weight_id' => 16, 'fare' => 21840, 'route_id' => 1,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 16, 'fare' => 37800, 'route_id' => 2,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 16, 'fare' => 60900, 'route_id' => 3,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 16, 'fare' => 15960, 'route_id' => 5,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 16, 'fare' => 39060, 'route_id' => 6,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 16, 'fare' => 23100, 'route_id' => 4,'type_id' => 2],//bereak
            ['additional_fee' => 0,'weight_id' => 17, 'fare' => 15600, 'route_id' => 1,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 17, 'fare' => 27000, 'route_id' => 2,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 17, 'fare' => 43500, 'route_id' => 3,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 17, 'fare' => 11400, 'route_id' => 5,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 17, 'fare' => 27900, 'route_id' => 6,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 17, 'fare' => 16500, 'route_id' => 4,'type_id' => 2],//bereak
            ['additional_fee' => 0,'weight_id' => 18, 'fare' => 18720, 'route_id' => 1,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 18, 'fare' => 32400, 'route_id' => 2,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 18, 'fare' => 52200, 'route_id' => 3,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 18, 'fare' => 13860, 'route_id' => 5,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 18, 'fare' => 33480, 'route_id' => 6,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 18, 'fare' => 19800, 'route_id' => 4,'type_id' => 2],//bereak            
            ['additional_fee' => 0,'weight_id' => 19, 'fare' => 24750, 'route_id' => 1,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 19, 'fare' => 41850, 'route_id' => 2,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 19, 'fare' => 17100, 'route_id' => 3,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 19, 'fare' => 65250, 'route_id' => 5,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 19, 'fare' => 40500, 'route_id' => 6,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 19, 'fare' => 23400, 'route_id' => 4,'type_id' => 2],//bereak            
            ['additional_fee' => 0,'weight_id' => 20, 'fare' => 33000, 'route_id' => 1,'type_id' => 2,],
            ['additional_fee' => 0,'weight_id' => 20, 'fare' => 55800, 'route_id' => 2,'type_id' => 2,],
            ['additional_fee' => 0,'weight_id' => 20, 'fare' => 22800, 'route_id' => 3,'type_id' => 2,],
            ['additional_fee' => 0,'weight_id' => 20, 'fare' => 87000, 'route_id' => 5,'type_id' => 2,],
            ['additional_fee' => 0,'weight_id' => 20, 'fare' => 54000, 'route_id' => 6,'type_id' => 2,],
            ['additional_fee' => 0,'weight_id' => 20, 'fare' => 31200, 'route_id' => 4,'type_id' => 2,],//bereak            
            ['additional_fee' => 0,'weight_id' => 21, 'fare' => 49500, 'route_id' => 1,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 21, 'fare' => 83700, 'route_id' => 2,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 21, 'fare' => 34200, 'route_id' => 3,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 21, 'fare' => 130500, 'route_id' => 5,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 21, 'fare' => 81000, 'route_id' => 6,'type_id' => 2],
            ['additional_fee' => 0,'weight_id' => 21, 'fare' => 46800, 'route_id' => 4,'type_id' => 2],//bereak
        ];
        foreach ($fares as $fare) {
            Fare::factory()->create($fare);
        }
        //         route 1 semirara - sj out, 
        // 2caluya - sj out, 
        // 3 libertad - sj out, 
        // 4 libertad- caluya in, 
        // 5 caluya - semirara in, 
        // 6 libertad -semirara in  
        // // 
        //         
    }
}
