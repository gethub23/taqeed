<?php

use Illuminate\Database\Seeder;

class TankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        DB::table('tanks')->insert([
            'name'        => 'خزان 92 الرياض' ,
            'capacity'    => 10000 ,
            'current_capacity'    => 6000 ,
            'station_id'  => 1 ,
            'fuel_id'     => 1 ,
        ]);
        // 2
        DB::table('tanks')->insert([
            'name'        => 'خزان 91 الرياض' ,
            'capacity'    => 10000 ,
            'current_capacity'    => 10000 ,
            'station_id'  => 1 ,
            'fuel_id'     => 2 ,
        ]);
        // 3
        DB::table('tanks')->insert([
            'name'        => 'خزان 95 الرياض' ,
            'capacity'    => 10000 ,
            'current_capacity'    => 10000 ,
            'station_id'  => 1 ,
            'fuel_id'     => 3 ,
        ]);

        // 4
        DB::table('tanks')->insert([
            'name'        => 'خزان 92 المدينة' ,
            'capacity'    => 10000 ,
            'current_capacity'    => 10000 ,
            'station_id'  => 2 ,
            'fuel_id'     => 4 ,
        ]);
        // 5
        DB::table('tanks')->insert([
            'name'        => 'خزان 91 المدينة' ,
            'capacity'    => 10000 ,
            'current_capacity'    => 10000 ,
            'station_id'  => 2 ,
            'fuel_id'     => 5 ,
        ]);
        // 6
        DB::table('tanks')->insert([
            'name'        => 'خزان 95 المدينة' ,
            'capacity'    => 10000 ,
            'current_capacity'    => 10000 ,
            'station_id'  => 2 ,
            'fuel_id'     => 6 ,
        ]);
        // 7
        DB::table('tanks')->insert([
            'name'        => 'خزان 92 الدمام' ,
            'capacity'    => 10000 ,
            'current_capacity'    => 10000 ,
            'station_id'  => 3 ,
            'fuel_id'     => 7 ,
        ]);
        // 8
        DB::table('tanks')->insert([
            'name'        => 'خزان 91 الدمام' ,
            'capacity'    => 10000 ,
            'current_capacity'    => 10000 ,
            'station_id'  => 3 ,
            'fuel_id'     => 8 ,
        ]);
        // 9
        DB::table('tanks')->insert([
            'name'        => 'خزان 95 الدمام' ,
            'capacity'    => 10000 ,
            'current_capacity'    => 10000 ,
            'station_id'  => 3 ,
            'fuel_id'     => 9 ,
        ]);



        DB::table('tanks')->insert([
            'name'                => 'خزان 92 الرياض 2' ,
            'capacity'            => 10000 ,
            'current_capacity'    => 10000 ,
            'station_id'          => 1 ,
            'fuel_id'             => 1 ,
        ]);
        DB::table('tanks')->insert([
            'name'                => 'خزان 92 الرياض 3' ,
            'capacity'            => 10000 ,
            'current_capacity'    => 4000 ,
            'station_id'          => 1 ,
            'fuel_id'             => 1 ,
        ]);
    }
}
