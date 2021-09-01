<?php

use App\Models\Nationality;
use Illuminate\Database\Seeder;

class NationalityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // 1 
         Nationality::create(
            ['name' => [ 'ar' => 'مصري'    , 'en' => 'Egyptian']]
        );
        // 2 
        Nationality::create(
            ['name' => ['ar' => 'سعودي'    , 'en' => 'Saudi']] ,
        );
        // 3
        Nationality::create(
            ['name' => ['ar' => 'فلبيني'    , 'en' => 'Filipino']] ,
        );
        // 4 
        Nationality::create(
            ['name' => ['ar' => 'باكستاني'    , 'en' => 'Pakistani']]
        );
        // 5 
        Nationality::create(
            ['name' => ['ar' => 'هندي'       , 'en' => 'Indian']] 
        );
        // 6
        Nationality::create(
            ['name' => ['ar' => 'بنجلاديشي'       , 'en' => 'Bangladeshi']]
        );
        // 7
        Nationality::create(
            ['name' => ['ar' => 'سوري'  , 'en' => 'Syrian']]
        );
        //8
        Nationality::create(
            ['name' => ['ar' => 'صومالي'     , 'en' => 'Somali']]
        );
        //9
        Nationality::create(
            ['name' => ['ar' => 'يمني'   , 'en' => 'Yemeni']] 
        );
    }
}
