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
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(DistrictsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
        $this->call(CategoryItemTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ScheduleWeddingsTableSeeder::class);
    }
}
