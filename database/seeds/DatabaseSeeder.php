<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SettingSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(IntroSliderTableSeeder::class);
        $this->call(IntroServiceTableSeeder::class);
        $this->call(IntroFqsCategoryTableSeeder::class);
        $this->call(IntroFqsTableSeeder::class);
        $this->call(IntroPartenerTableSeeder::class);
        $this->call(IntroHowWorkTableSeeder::class);
        $this->call(IntroSocialTableSeeder::class);
        $this->call(CityTableSeeder::class);
        $this->call(NationalityTableSeeder::class);
        $this->call(StationTableSeeder::class);
        $this->call(StationRoleTableSeeder::class);
        $this->call(StationAdminTableSeeder::class);
        $this->call(FuelTableSeeder::class);
        $this->call(TankTableSeeder::class);
        $this->call(FuelPointTableSeeder::class);
        $this->call(StationWorkerTableSeeder::class);
    }
}
