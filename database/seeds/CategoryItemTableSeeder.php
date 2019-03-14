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
        $categoryItem = [];
        for ($i = 0; $i < 100; $i++) {
            $categoryItem[] = [
                'category_id' => rand(1, 11),
                'item_id' => rand(1, 100)
            ];
        }

        DB::table('category_item')->insert($categoryItem);
    }
}
