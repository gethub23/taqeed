<?php

use App\Models\StationRole;
use Illuminate\Database\Seeder;

class StationRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        StationRole::create([
            'station_id'    => 1 , 
            'name'    => 'مدير عام محطة وقود الرياض' , 
        ]);
        // 2
        StationRole::create([
            'station_id'    => 1 , 
            'name'    => 'مسئول مبيعات محطة وقود الرياض' , 
        ]);
        // 3
        StationRole::create([
            'station_id'    => 1 , 
            'name'    => 'مسئول متابعه الخزانات محطة وقود الرياض' , 
        ]);
        // 4
        StationRole::create([
            'station_id'    => 2 , 
            'name'    => 'مدير عام محطة وقود المدينة' , 
        ]);
        // 5
        StationRole::create([
            'station_id'    => 2 , 
            'name'    => 'مسئول مبيعات محطة وقود المدينة' , 
        ]);
        // 6
        StationRole::create([
            'station_id'    => 2 , 
            'name'    => 'مسئول متابعه الخزانات محطة وقود المدينة' , 
        ]);
    }
}
