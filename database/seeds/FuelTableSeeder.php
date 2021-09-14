<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        DB::table('fuels')->insert([
            'station_id'  => 1 ,
            'price'       => 5 ,
            'name'        => json_encode(['ar' => 'بنزين 92'  , 'en' => 'Gasoline 92']) ,
        ]);
        // 2
        DB::table('fuels')->insert([
            'station_id'  => 1 ,
            'price'       => 4 ,
            'name'        => json_encode(['ar' => 'بنزين 91'  , 'en' => 'Gasoline 91']) ,
        ]);
        // 3
        DB::table('fuels')->insert([
            'station_id'  => 1 ,
            'price'       => 6 ,
            'name'        => json_encode(['ar' => 'بنزين 95'  , 'en' => 'Gasoline 95']) ,
        ]);
        
        // 4
        DB::table('fuels')->insert([
            'station_id'  => 2 ,
            'price'       => 5 ,
            'name'        => json_encode(['ar' => 'بنزين 92'  , 'en' => 'Gasoline 92']) ,
        ]);
        
        // 5
        DB::table('fuels')->insert([
            'station_id'  => 2 ,
            'price'       => 4 ,
            'name'        => json_encode(['ar' => 'بنزين 91'  , 'en' => 'Gasoline 91']) ,
        ]);
        // 6
        DB::table('fuels')->insert([
            'station_id'  => 2 ,
            'price'       => 6 ,
            'name'        => json_encode(['ar' => 'بنزين 95'  , 'en' => 'Gasoline 95']) ,
        ]);

        // 7
        DB::table('fuels')->insert([
            'station_id'  => 3 ,
            'price'       => 5 ,
            'name'        => json_encode(['ar' => 'بنزين 92'  , 'en' => 'Gasoline 92']) ,
        ]);
        // 8
        DB::table('fuels')->insert([
            'station_id'  => 3 ,
            'price'       => 4 ,
            'name'        => json_encode(['ar' => 'بنزين 91'  , 'en' => 'Gasoline 91']) ,
        ]);
        // 9
        DB::table('fuels')->insert([
            'station_id'  => 3 ,
            'price'       => 6 ,
            'name'        => json_encode(['ar' => 'بنزين 95'  , 'en' => 'Gasoline 95']) ,
        ]);

        // 10
        DB::table('fuels')->insert([
            'station_id'  => 4 ,
            'price'       => 5 ,
            'name'        => json_encode(['ar' => 'بنزين 92'  , 'en' => 'Gasoline 92']) ,
        ]);
        // 11
        DB::table('fuels')->insert([
            'station_id'  => 4 ,
            'price'       => 4 ,
            'name'        => json_encode(['ar' => 'بنزين 91'  , 'en' => 'Gasoline 91']) ,
        ]);
        // 12
        DB::table('fuels')->insert([
            'station_id'  => 4 ,
            'price'       => 6 ,
            'name'        => json_encode(['ar' => 'بنزين 95'  , 'en' => 'Gasoline 95']) ,
        ]);
    }
}
