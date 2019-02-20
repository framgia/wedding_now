<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $permission_count = DB::table('permissions')->count('id');

        // $permission_role_admin = [];

        // for ($i = 1; $i <= $permission_count; $i++) {
        //     $permission_role_admin[] = [
        //         'role_id' => 1,
        //         'permission_id' => $i,
        //     ];
        // }

        // DB::table('permission_role')->insert($permission_role_admin);

    }
}
