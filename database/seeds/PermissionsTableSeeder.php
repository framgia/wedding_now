<?php

use App\Models\Permission;
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
        $model = [
            'role',
            'user',
            'item',
            'schedule',
        ];
        $permission = [];

        foreach ($model as $m) {
            $permission[] = [
                [
                    'name' => $m . '-create',
                    'display_name' => 'Create ' . ucfirst($m),
                    'description' => 'Create New ' . ucfirst($m),
                ],
                [
                    'name' => $m . '-list',
                    'display_name' => 'View List ' . ucfirst($m),
                    'description' => 'View List ' . ucfirst($m),
                ],
                [
                    'name' => $m . '-update',
                    'display_name' => 'Update ' . ucfirst($m),
                    'description' => 'Update '. ucfirst($m),
                ],
                [
                    'name' => $m . '-delete',
                    'display_name' => 'Delete ' . ucfirst($m),
                    'description' => 'Delete ' . ucfirst($m)
                ],
            ];
        }

        foreach ($permission as $value) {
            Permission::insert($value);
        }
    }
}
