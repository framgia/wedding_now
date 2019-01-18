<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'Administrator',
            ], [
                'name' => 'Vendor',
            ], [
                'name' => 'Client',
            ],
        ];

        DB::table('roles')->insert($roles);
    }
}
