<?php

use App\Models\City;
use App\Models\Nationality;
use App\Models\StationRole;
use App\Models\StationAdmin;
use Illuminate\Database\Seeder;

class StationAdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1 
        StationAdmin::create([
            'station_id'        => 1 , 
            'name'              => 'مدير عام' , 
            'phone'             => '01033323111' , 
            'identity'          => '01033323111' , 
            'password'          => '123456' , 
            'type'              => 'master' , 
            'nationality_id'    => Nationality::inRandomOrder()->first()->id , 
            'city_id'           => City::inRandomOrder()->first()->id , 
            'station_id'        => 1 , 
            'station_role_id'   => StationRole::inRandomOrder()->first()->id , 
        ]);
    }
}
