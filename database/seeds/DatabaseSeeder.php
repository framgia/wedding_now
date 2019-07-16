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
        $this->call(CitiesSeeder::class);
        $this->call(DistrictsSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
//        $this->call(CategoryItemTableSeeder::class);
        $this->call(ScheduleTableSeeder::class);
        $this->call(TimeFramesTableSeeder::class);
        $this->call(TasksTableSeeder::class);
        $this->call(TopicsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(TemplateCardSeeder::class);
    }
}
