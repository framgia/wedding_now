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
                'name' => 'admin',
                'display_name' => 'Admin',
                'description' => 'Full Permission'
            ], [
                'name' => 'vendor',
                'display_name' => 'Vendor',
                'description' => 'Vendor Permission'
            ], [
                'name' => 'client',
                'display_name' => 'Client',
                'description' => 'Client Permission'
            ],
        ];

        DB::table('roles')->insert($roles);
    }
}
