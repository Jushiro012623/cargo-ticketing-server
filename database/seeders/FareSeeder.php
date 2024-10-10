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
            ['additional_fee' => 50, 'regular' => 500,  'student' => 425, 'pwd_senior' => 400, 'half_fare' => 250, 'minor' => 125, 'type_id' => 1, 'route_id' => 1,],
            ['additional_fee' => 70, 'regular' => 750, 'student' => 640, 'pwd_senior' => 600, 'half_fare' => 375, 'minor' => 190, 'type_id' => 1, 'route_id' => 2,],
            ['additional_fee' => 100, 'regular' => 1060,  'student' => 905, 'pwd_senior' => 850, 'half_fare' => 530, 'minor' => 125, 'type_id' => 1, 'route_id' => 3,],
            ['additional_fee' => 50, 'regular' => 375,  'student' => 320, 'pwd_senior' => 300, 'half_fare' => 190, 'minor' => 100, 'type_id' => 1, 'route_id' => 5,],
            ['additional_fee' => 70, 'regular' => 900,  'student' => 765, 'pwd_senior' => 720, 'half_fare' => 450, 'minor' => 225, 'type_id' => 1, 'route_id' => 6,],
            ['additional_fee' => 50, 'regular' => 700,  'student' => 595, 'pwd_senior' => 560, 'half_fare' => 350, 'minor' => 175, 'type_id' => 1, 'route_id' => 4,],

            
            ['additional_fee' => 70, 'regular' => 750, 'student' => 640, 'pwd_senior' => 600, 'half_fare' => 375, 'minor' => 190, 'type_id' => 3, 'route_id' => 2,],
            ['additional_fee' => 100, 'regular' => 1060,  'student' => 905, 'pwd_senior' => 850, 'half_fare' => 530, 'minor' => 125, 'type_id' => 3, 'route_id' => 3,],
            ['additional_fee' => 50, 'regular' => 375,  'student' => 320, 'pwd_senior' => 300, 'half_fare' => 190, 'minor' => 100, 'type_id' => 3, 'route_id' => 5,],
            ['additional_fee' => 70, 'regular' => 900,  'student' => 765, 'pwd_senior' => 720, 'half_fare' => 450, 'minor' => 225, 'type_id' => 3, 'route_id' => 6,],
            ['additional_fee' => 50, 'regular' => 700,  'student' => 595, 'pwd_senior' => 560, 'half_fare' => 350, 'minor' => 175, 'type_id' => 3, 'route_id' => 4,],
            //bike
            ['length' => 0.5, 'regular' => 420, 'route_id' => 1,'type_id' => 2],
            ['length' => 0.5, 'regular' => 600, 'route_id' => 2,'type_id' => 2],
            ['length' => 0.5, 'regular' => 840, 'route_id' => 3,'type_id' => 2],
            ['length' => 0.5, 'regular' => 350, 'route_id' => 5,'type_id' => 2],
            ['length' => 0.5, 'regular' => 600, 'route_id' => 6,'type_id' => 2],
            ['length' => 0.5, 'regular' => 450, 'route_id' => 4,'type_id' => 2],

            //sidecar
            ['length' => 1, 'regular' => 1200, 'route_id' => 1,'type_id' => 2 ],
            ['length' => 1, 'regular' => 1800, 'route_id' => 2,'type_id' => 2 ],
            ['length' => 1, 'regular' => 2400, 'route_id' => 3,'type_id' => 2 ],
            ['length' => 1, 'regular' => 540, 'route_id' => 5, 'type_id' => 2 ],
            ['length' => 1, 'regular' => 1800, 'route_id' => 6,'type_id' => 2 ],
            ['length' => 1, 'regular' => 1200, 'route_id' => 4,'type_id' => 2 ],

            //motor
            ['length' => 2, 'regular' => 1000, 'route_id' => 1,'type_id' => 2],
            ['length' => 2, 'regular' => 3240, 'route_id' => 2,'type_id' => 2],
            ['length' => 2, 'regular' => 5220, 'route_id' => 3,'type_id' => 2],
            ['length' => 2, 'regular' => 1370, 'route_id' => 5,'type_id' => 2],
            ['length' => 2, 'regular' => 3350, 'route_id' => 4,'type_id' => 2],
            ['length' => 2, 'regular' => 1980, 'route_id' => 4,'type_id' => 2],

            ['length' => 3, 'regular' => 2400, 'route_id' => 1,'type_id' => 2],
            ['length' => 3, 'regular' => 3600, 'route_id' => 2,'type_id' => 2],
            ['length' => 3, 'regular' => 5400, 'route_id' => 3,'type_id' => 2],
            ['length' => 3, 'regular' => 2100, 'route_id' => 5,'type_id' => 2],
            ['length' => 3, 'regular' => 3600, 'route_id' => 6,'type_id' => 2],
            ['length' => 3, 'regular' => 2400, 'route_id' => 4,'type_id' => 2],

            ['length' => 4, 'regular' => 5000, 'route_id' => 1,'type_id' => 2],
            ['length' => 4, 'regular' => 9640, 'route_id' => 2,'type_id' => 2],
            ['length' => 4, 'regular' => 13920, 'route_id' => 3,'type_id' => 2],
            ['length' => 4, 'regular' => 3650, 'route_id' => 5,'type_id' => 2],
            ['length' => 4, 'regular' => 8950, 'route_id' => 6,'type_id' => 2],
            ['length' => 4, 'regular' => 5280, 'route_id' => 4,'type_id' => 2],


            ['length' => 5, 'regular' => 6500, 'route_id' => 1,'type_id' => 2],
            ['length' => 5, 'regular' => 10800, 'route_id' => 2,'type_id' =>2],
            ['length' => 5, 'regular' => 17400, 'route_id' => 3,'type_id' =>2],
            ['length' => 5, 'regular' => 4560, 'route_id' => 5,'type_id' => 2],
            ['length' => 5, 'regular' => 11160, 'route_id' => 6,'type_id' =>2],
            ['length' => 5, 'regular' => 6600, 'route_id' => 4,'type_id' => 2],


            ['length' => 6, 'regular' => 7500, 'route_id' => 1,'type_id' => 2],
            ['length' => 6, 'regular' => 12960, 'route_id' => 2,'type_id' => 2],
            ['length' => 6, 'regular' => 20880, 'route_id' => 3,'type_id' => 2],
            ['length' => 6, 'regular' => 5480, 'route_id' => 5,'type_id' => 2],
            ['length' => 6, 'regular' => 13400, 'route_id' => 6,'type_id' => 2],
            ['length' => 6, 'regular' => 7920, 'route_id' => 4,'type_id' => 2],


            ['length' => 7, 'regular' => 8750, 'route_id' => 1, 'type_id' => 2],
            ['length' => 7, 'regular' => 15120, 'route_id' => 2,'type_id' => 2],
            ['length' => 7, 'regular' => 24360, 'route_id' => 3,'type_id' => 2],
            ['length' => 7, 'regular' => 6390, 'route_id' => 5,'type_id' => 2],
            ['length' => 7, 'regular' => 15625, 'route_id' => 6,'type_id' => 2],
            ['length' => 7, 'regular' => 9240, 'route_id' => 4,'type_id' => 2],


            ['length' => 8, 'regular' => 10000, 'route_id' => 1,'type_id' => 2],
            ['length' => 8, 'regular' => 17280, 'route_id' => 2,'type_id' => 2],
            ['length' => 8, 'regular' => 27840, 'route_id' => 3,'type_id' => 2],
            ['length' => 8, 'regular' => 7300, 'route_id' => 5,'type_id' => 2],
            ['length' => 8, 'regular' => 17860, 'route_id' => 6,'type_id' => 2],
            ['length' => 8, 'regular' => 10560, 'route_id' => 4,'type_id' => 2],

            ['length' => 8.9, 'regular' => 14000, 'route_id' => 1,'type_id' => 2],
            ['length' => 8.9, 'regular' => 24300, 'route_id' => 2,'type_id' => 2],
            ['length' => 8.9, 'regular' => 39150, 'route_id' => 3,'type_id' => 2],
            ['length' => 8.9, 'regular' => 10260, 'route_id' => 5,'type_id' => 2],
            ['length' => 8.9, 'regular' => 25200, 'route_id' => 6,'type_id' => 2],
            ['length' => 8.9, 'regular' => 14850, 'route_id' => 4,'type_id' => 2],

            ['length' => 9.9, 'regular' => 14820, 'route_id' => 1,'type_id' => 2],
            ['length' => 9.9, 'regular' => 25650, 'route_id' => 2,'type_id' => 2],
            ['length' => 9.9, 'regular' => 41326, 'route_id' => 3,'type_id' => 2],
            ['length' => 9.9, 'regular' => 10830, 'route_id' => 5,'type_id' => 2],
            ['length' => 9.9, 'regular' => 26500, 'route_id' => 6,'type_id' => 2],
            ['length' => 9.9, 'regular' => 15700, 'route_id' => 4,'type_id' => 2],

            ['length' => 10, 'regular' => 15600, 'route_id' => 1,'type_id' => 2],
            ['length' => 10, 'regular' => 27000, 'route_id' => 2,'type_id' => 2],
            ['length' => 10, 'regular' => 43500, 'route_id' => 3,'type_id' => 2],
            ['length' => 10, 'regular' => 11400, 'route_id' => 5,'type_id' => 2],
            ['length' => 10, 'regular' => 27900, 'route_id' => 6,'type_id' => 2],
            ['length' => 10, 'regular' => 16500, 'route_id' => 4,'type_id' => 2],

            ['length' => 11, 'regular' => 17160, 'route_id' => 1,'type_id' => 2],
            ['length' => 11, 'regular' => 29700, 'route_id' => 2,'type_id' => 2],
            ['length' => 11, 'regular' => 47850, 'route_id' => 3,'type_id' => 2],
            ['length' => 11, 'regular' => 12540, 'route_id' => 5,'type_id' => 2],
            ['length' => 11, 'regular' => 30690, 'route_id' => 6,'type_id' => 2],
            ['length' => 11, 'regular' => 18150, 'route_id' => 4,'type_id' => 2],

            ['length' => 12, 'regular' => 18720, 'route_id' => 1,'type_id' => 2],
            ['length' => 12, 'regular' => 32400, 'route_id' => 2,'type_id' => 2],
            ['length' => 12, 'regular' => 52200, 'route_id' => 3,'type_id' => 2],
            ['length' => 12, 'regular' => 13860, 'route_id' => 5,'type_id' => 2],
            ['length' => 12, 'regular' => 33480, 'route_id' => 6,'type_id' => 2],
            ['length' => 12, 'regular' => 19800, 'route_id' => 4,'type_id' => 2],

            ['length' => 13, 'regular' => 20280, 'route_id' => 1,'type_id' => 2],
            ['length' => 13, 'regular' => 35100, 'route_id' => 2,'type_id' => 2],
            ['length' => 13, 'regular' => 56550, 'route_id' => 3,'type_id' => 2],
            ['length' => 13, 'regular' => 14820, 'route_id' => 5,'type_id' => 2],
            ['length' => 13, 'regular' => 36270, 'route_id' => 6,'type_id' => 2],
            ['length' => 13, 'regular' => 21450, 'route_id' => 4,'type_id' => 2],

            ['length' => 14, 'regular' => 21840, 'route_id' => 1,'type_id' => 2],
            ['length' => 14, 'regular' => 37800, 'route_id' => 2,'type_id' => 2],
            ['length' => 14, 'regular' => 60900, 'route_id' => 3,'type_id' => 2],
            ['length' => 14, 'regular' => 15960, 'route_id' => 5,'type_id' => 2],
            ['length' => 14, 'regular' => 39060, 'route_id' => 6,'type_id' => 2],
            ['length' => 14, 'regular' => 23100, 'route_id' => 4,'type_id' => 2],

            ['length' => 15, 'regular' => 15600, 'route_id' => 1,'type_id' => 2],
            ['length' => 15, 'regular' => 27000, 'route_id' => 2,'type_id' => 2],
            ['length' => 15, 'regular' => 43500, 'route_id' => 3,'type_id' => 2],
            ['length' => 15, 'regular' => 11400, 'route_id' => 5,'type_id' => 2],
            ['length' => 15, 'regular' => 27900, 'route_id' => 6,'type_id' => 2],
            ['length' => 15, 'regular' => 16500, 'route_id' => 4,'type_id' => 2],

            ['length' => 16, 'regular' => 18720, 'route_id' => 1,'type_id' => 2],
            ['length' => 16, 'regular' => 32400, 'route_id' => 2,'type_id' => 2],
            ['length' => 16, 'regular' => 52200, 'route_id' => 3,'type_id' => 2],
            ['length' => 16, 'regular' => 13860, 'route_id' => 5,'type_id' => 2],
            ['length' => 16, 'regular' => 33480, 'route_id' => 6,'type_id' => 2],
            ['length' => 16, 'regular' => 19800, 'route_id' => 4,'type_id' => 2],

            
            ['length' => 17, 'regular' => 24750, 'route_id' => 1,'type_id' => 2],
            ['length' => 17, 'regular' => 41850, 'route_id' => 2,'type_id' => 2],
            ['length' => 17, 'regular' => 17100, 'route_id' => 3,'type_id' => 2],
            ['length' => 17, 'regular' => 65250, 'route_id' => 5,'type_id' => 2],
            ['length' => 17, 'regular' => 40500, 'route_id' => 6,'type_id' => 2],
            ['length' => 17, 'regular' => 23400, 'route_id' => 4,'type_id' => 2],

            
            ['length' => 18, 'regular' => 33000, 'route_id' => 1,'type_id' => 2,],
            ['length' => 18, 'regular' => 55800, 'route_id' => 2,'type_id' => 2,],
            ['length' => 18, 'regular' => 22800, 'route_id' => 3,'type_id' => 2,],
            ['length' => 18, 'regular' => 87000, 'route_id' => 5,'type_id' => 2,],
            ['length' => 18, 'regular' => 54000, 'route_id' => 6,'type_id' => 2,],
            ['length' => 18, 'regular' => 31200, 'route_id' => 4,'type_id' => 2,],
            
            ['length' => 18, 'regular' => 49500, 'route_id' => 1,'type_id' => 2],
            ['length' => 18, 'regular' => 83700, 'route_id' => 2,'type_id' => 2],
            ['length' => 18, 'regular' => 34200, 'route_id' => 3,'type_id' => 2],
            ['length' => 18, 'regular' => 130500, 'route_id' => 5,'type_id' => 2],
            ['length' => 18, 'regular' => 81000, 'route_id' => 6,'type_id' => 2],
            ['length' => 18, 'regular' => 46800, 'route_id' => 4,'type_id' => 2],
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
