<?php

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
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
        
        $user = User::create([
            'name' => 'Nguyen Van A',
            'user_name' => 'ann',
            'birthday' => Carbon::create('1994', '12', '23'),
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'gender' => 'male',
            'phone' => '0123456789',
        ]);

        $user->roles()->attach(1);

        $user->media()->create([
            'name' => 'avatar.png',
            'type' => 'image',
        ]);

        $user->locations()->create([
            'address' => 'Ha Noi',
            'district_id' => 1,
            'type' => config('define.location.type.home'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        factory(User::class, 10)->create()->each(function($user) {

            $user->locations()->create([
                'address' => 'Some where ...',
                'locationable_id' => $user->id,
                'district_id' => rand(1, 26),
                'type' => config('define.location.type.home'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            $user->media()->create([
                'name' => 'avatar.png',
            ]);

            $user->roles()->attach(3);
        });
    }
}
