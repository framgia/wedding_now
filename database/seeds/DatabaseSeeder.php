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
        $this->call(PermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CategoryUserTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
        // $this->call(ItemUserTableSeeder::class);
        $this->call(CategoryItemTableSeeder::class);
        $this->call(ScheduleWeddingsTableSeeder::class);
        $this->call(TimeFramesTableSeeder::class);
        $this->call(TasksTableSeeder::class);
        $this->call(TopicsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(TemplateCardSeeder::class);
    }
}
