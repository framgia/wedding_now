<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $users = [
            [
                'name' => 'Nguyen Van A',
                'user_name' => 'ann',
                'birthday' => Carbon::create('1994', '12', '23'),
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'gender' => 'Male',
                'phone' => '0123456789',
            ], [
                'name' => 'Nguyen Van B',
                'user_name' => 'ann1',
                'birthday' => Carbon::create('1994', '12', '23'),
                'email' => 'vendor@gmail.com',
                'password' => bcrypt('123456'),
                'gender' => 'Male',
                'phone' => '012345676',
            ], [
                'name' => 'Nguyen Van C',
                'user_name' => 'ann2',
                'birthday' => Carbon::create('1994', '12', '23'),
                'email' => 'client@gmail.com',
                'password' => bcrypt('123456'),
                'gender' => 'Male',
                'phone' => '012345686',
            ],
        ];

        for ($i = 0; $i < 10; $i++) {
            $users[] = [
                'name' => $faker->name,
                'user_name' => $faker->userName,
                'birthday' => Carbon::create('2018', '12', '23'),
                'email' => $faker->email,
                'password' => bcrypt('123456'),
                'gender' => $faker->randomElement(['Male', 'Female']),
                'phone' => '0123456789',
            ];
        }

        DB::table('users')->insert($users);
    }
}
