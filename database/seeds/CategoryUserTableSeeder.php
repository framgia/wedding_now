<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'user_id' => 1,
                'category_id' => 1,
            ], [
                'user_id' => 2,
                'category_id' => 2,
            ], [
                'user_id' => 4,
                'category_id' => 3,
            ], [
                'user_id' => 1,
                'category_id' => 4,
            ], [
                'user_id' => 2,
                'category_id' => 5,
            ], [
                'user_id' => 1,
                'category_id' => 2,
            ], [
                'user_id' => 4,
                'category_id' => 3,
            ], [
                'user_id' => 4,
                'category_id' => 1,
            ],
        ];

        DB::table('category_user')->insert($data);
    }
}
