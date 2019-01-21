<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_items = [
            [
                'category_id' => 1,
                'item_id' => 2
            ], [
                'category_id' => 2,
                'item_id' => 1
            ], [
                'category_id' => 3,
                'item_id' => 2
            ], [
                'category_id' => 4,
                'item_id' => 1
            ], [
                'category_id' => 3,
                'item_id' => 2
            ], [
                'category_id' => 2,
                'item_id' => 1
            ], [
                'category_id' => 5,
                'item_id' => 3
            ],
        ];

        DB::table('category_item')->insert($category_items);
    }
}
