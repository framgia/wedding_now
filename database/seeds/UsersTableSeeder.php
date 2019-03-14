<?php

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
// use Faker\Factory as Faker;
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
        DB::table('users')->delete();

        //1) Create Admin Role
        $roles = [
            'name' => 'admin',
            'display_name' => 'Admin',
            'description' => 'Full Permission'
        ];

        $role = Role::create($roles);

        //2) Set Role Permissions
        // Get all permission, swift through and attach them to the role
        $permission = Permission::get();
        foreach ($permission as $key => $value) {
            $role->attachPermission($value);
        }

        //3) Create Admin User
        $user = [
            'name' => 'Nguyen Van A',
            'user_name' => 'ann',
            'birthday' => Carbon::create('1994', '12', '23'),
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'gender' => 'male',
            'phone' => '0123456789',
        ];

        $user = User::create($user);

        // 4) Set User Role
        $user->attachRole($role);

        // location
        $user->locations()->create([
            'address' => 'asasd asdasd',
            'district_id' => 1,
        ]);

        $data = [
            [
                'name' => 'Nguyen Van B',
                'user_name' => 'ann1',
                'birthday' => Carbon::create('1994', '12', '23'),
                'email' => 'admin1@gmail.com',
                'password' => bcrypt('123456'),
                'gender' => 'male',
                'phone' => '0123456788',
            ], [
                'name' => 'Nguyen Van C',
                'user_name' => 'ann2',
                'birthday' => Carbon::create('1994', '12', '23'),
                'email' => 'admin2@gmail.com',
                'password' => bcrypt('123456'),
                'gender' => 'male',
                'phone' => '0123456787',
            ], [
                'name' => 'Nguyen Van D',
                'user_name' => 'ann3',
                'birthday' => Carbon::create('1994', '12', '23'),
                'email' => 'admin3@gmail.com',
                'password' => bcrypt('123456'),
                'gender' => 'male',
                'phone' => '0123456786',
            ],
        ];

        DB::table('users')->insert($data);
        factory(User::class, 100)->create()->each(function($user) {
            $user->locations()->create([
                'address' => str_random(10),
                'locationable_id' => $user->id,
                'locationable_type' => 'App\Models\User',
                'district_id' => rand(1, 812),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        });
    }
}
