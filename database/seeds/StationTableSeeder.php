<?php

use App\Models\Station;
use Illuminate\Database\Seeder;

class StationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        Station::create([
            'name'          => 'محطة وقود الرياض' , 
            'phone'         => '0501234567' , 
            'latitude'      => 24.7241504 , 
            'longitude'     => 47.3830068 , 
        ]);
        //2 
        Station::create([
            'name'          => 'محطة وقود المدينة' , 
            'phone'         => '0502234567' , 
            'latitude'      => 24.4710078 , 
            'longitude'     => 39.757644 , 
        ]);
        //3
        Station::create([
            'name'          => 'محطة وقود الدمام' , 
            'phone'         => '0503234567' , 
            'latitude'      => 26.3624931 , 
            'longitude'     => 50.1326268 , 
        ]);
        //4
        Station::create([
            'name'          => 'محطة وقود القصيم' , 
            'phone'         => '0504234567' , 
            'latitude'      => 26.3466525 , 
            'longitude'     => 45.3477512 , 
        ]);
        //5
        Station::create([
            'name'          => 'محطة وقود جدة' , 
            'phone'         => '0505234567' , 
            'latitude'      => 21.4491899 , 
            'longitude'     => 39.7716326 , 
        ]);
        //6
        Station::create([
            'name'          => 'محطة وقود مكة' , 
            'phone'         => '0505234567' , 
            'latitude'      => 21.4359571 , 
            'longitude'     => 39.9866333 , 
        ]);
    }
}
