<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'admin',
            'email'     => 'aait@info.com',
            'phone'     => '0555105813',
            'password'  => 123456,
            'user_type' =>'admin',
            'role_id'   => 1,
            'active'    => 1,
        ]);

        User::create([
            'name'      => 'fekry',
            'email'     => 'm1@a.s',
            'phone'     => '1069541294',
            'password'  => 123456,
            'user_type' => 'user',
            'active'    => 1,
            'user_type' => 2,
        ]);
    }
}
