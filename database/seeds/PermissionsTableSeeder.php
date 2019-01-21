<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $actions = [
            'view',
            'create',
            'edit',
            'delete',
        ];

        $models = [
            'roles',
            'users',
            'admins',
            'vendors',
            'categories',
            'schedule_weddings',
            'cities',
            'districts',
            'items',
            'tags',
            'posts',
        ];

        $permissions = [];

        foreach ($actions as $action) {
            foreach ($models as $model) {
                $permissions[] = [
                    'slug' => $action . '-' . $model,
                    'description' => ucfirst($action) . ' ' . $model,
                ];
            }
        }

        DB::table('permissions')->insert($permissions);
    }
}
