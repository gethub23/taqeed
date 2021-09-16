<?php

use Illuminate\Database\Seeder;

class StationWorkerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // station number 1 workers
        DB::table('station_workers')->insert([
            'name'              => 'عامل 1 محطة وقود الرياض' , 
            'phone'             => '0505555555' , 
            'password'          => bcrypt('123456') , 
            'identity'          => '0505555555' , 
            'work_time'         => '9-5' , 
            'type'              => 'worker' , 
            'station_id'        => 1 , 
            'city_id'           => 1 , 
            'nationality_id'    => 1 , 
            'active'            => true , 
        ]);
        DB::table('station_workers')->insert([
            'name'              => 'عامل 2 محطة وقود الرياض' , 
            'phone'             => '0505555554' , 
            'password'          => bcrypt('123456') , 
            'identity'          => '0505555554' , 
            'work_time'         => '9-5' , 
            'type'              => 'worker' , 
            'station_id'        => 1 , 
            'city_id'           => 1 , 
            'nationality_id'    => 1 , 
            'active'            => true , 
        ]);
        DB::table('station_workers')->insert([
            'name'              => 'مشرف  محطة وقود الرياض' , 
            'phone'             => '0505555550' , 
            'password'          => bcrypt('123456') , 
            'identity'          => '0505555550' , 
            'work_time'         => '9-5' , 
            'type'              => 'supervisor' , 
            'station_id'        => 1 , 
            'city_id'           => 1 , 
            'nationality_id'    => 1 , 
            'active'            => true , 
        ]);
        // station number 2 workers
        DB::table('station_workers')->insert([
            'name'              => 'عامل 1 محطة وقود المدينة' , 
            'phone'             => '0504555555' , 
            'password'          => bcrypt('123456') , 
            'identity'          => '0504555555' , 
            'work_time'         => '9-5' , 
            'type'              => 'worker' , 
            'station_id'        => 2 , 
            'city_id'           => 2 , 
            'nationality_id'    => 1 , 
            'active'            => true , 
        ]);
        DB::table('station_workers')->insert([
            'name'              => 'عامل 2 محطة وقود الرياض' , 
            'phone'             => '0504555554' , 
            'password'          => bcrypt('123456') , 
            'identity'          => '0504555554' , 
            'work_time'         => '9-5' , 
            'type'              => 'worker' , 
            'station_id'        => 2 , 
            'city_id'           => 2 , 
            'nationality_id'    => 2 , 
            'active'            => true , 
        ]);
        DB::table('station_workers')->insert([
            'name'              => 'مشرف  محطة وقود الرياض' , 
            'phone'             => '0504555550' , 
            'password'          => bcrypt('123456') , 
            'identity'          => '0504555550' , 
            'work_time'         => '9-5' , 
            'type'              => 'supervisor' , 
            'station_id'        => 2 , 
            'city_id'           => 2 , 
            'nationality_id'    => 1 , 
            'active'            => true , 
        ]);
        // station number 3 workers
        DB::table('station_workers')->insert([
            'name'              => 'عامل 1 محطة وقود الدمام' , 
            'phone'             => '0503555555' , 
            'password'          => bcrypt('123456') , 
            'identity'          => '0503555555' , 
            'work_time'         => '9-5' , 
            'type'              => 'worker' , 
            'station_id'        => 3 , 
            'city_id'           => 3 , 
            'nationality_id'    => 1 , 
            'active'            => true , 
        ]);
        DB::table('station_workers')->insert([
            'name'              => 'عامل 2 محطة وقود الدمام' , 
            'phone'             => '0503555554' , 
            'password'          => bcrypt('123456') , 
            'identity'          => '0503555554' , 
            'work_time'         => '9-5' , 
            'type'              => 'worker' , 
            'station_id'        => 3 , 
            'city_id'           => 3 , 
            'nationality_id'    => 2 , 
            'active'            => true , 
        ]);
        DB::table('station_workers')->insert([
            'name'              => 'مشرف  محطة وقود الدمام' , 
            'phone'             => '0503555550' , 
            'password'          => bcrypt('123456') , 
            'identity'          => '0503555550' , 
            'work_time'         => '9-5' , 
            'type'              => 'supervisor' , 
            'station_id'        => 3 , 
            'city_id'           => 3 , 
            'nationality_id'    => 1 , 
            'active'            => true , 
        ]);
    }
}
