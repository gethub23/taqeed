<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuelPointTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        DB::table('fuel_points')->insert([
            'name'        => 'نقطة وقود 92 الرياض' ,
            'identity'    => '89313108830' ,
            'station_id'  => 1 ,
            'fuel_id'     => 1 ,
        ]);
        // 2
        DB::table('fuel_points')->insert([
            'name'        => 'نقطة وقود 91 الرياض' ,
            'identity'    => '89313108831' ,
            'station_id'  => 1 ,
            'fuel_id'     => 2 ,
        ]);
        // 3
        DB::table('fuel_points')->insert([
            'name'        => 'نقطة وقود 95 الرياض' ,
            'identity'    => '89313108832' ,
            'station_id'  => 1 ,
            'fuel_id'     => 3 ,
        ]);

        // 4
        DB::table('fuel_points')->insert([
            'name'        => 'نقطة وقود 92 المدينة' ,
            'identity'    => '89313108833' ,
            'station_id'  => 2 ,
            'fuel_id'     => 4 ,
        ]);
        // 5
        DB::table('fuel_points')->insert([
            'name'        => 'نقطة وقود 91 المدينة' ,
            'identity'    => '89313108834' ,
            'station_id'  => 2 ,
            'fuel_id'     => 5 ,
        ]);
        // 6
        DB::table('fuel_points')->insert([
            'name'        => 'نقطة وقود 95 المدينة' ,
            'identity'    => '89313108835' ,
            'station_id'  => 2 ,
            'fuel_id'     => 6 ,
        ]);
        // 7
        DB::table('fuel_points')->insert([
            'name'        => 'نقطة وقود 92 الدمام' ,
            'identity'    => '89313108836' ,
            'station_id'  => 3 ,
            'fuel_id'     => 7 ,
        ]);
        // 8
        DB::table('fuel_points')->insert([
            'name'        => 'نقطة وقود 91 الدمام' ,
            'identity'    => '89313108837' ,
            'station_id'  => 3 ,
            'fuel_id'     => 8 ,
        ]);
        // 9
        DB::table('fuel_points')->insert([
            'name'        => 'نقطة وقود 95 الدمام' ,
            'identity'    => '89313108838' ,
            'station_id'  => 3 ,
            'fuel_id'     => 9 ,
        ]);
    }
}
