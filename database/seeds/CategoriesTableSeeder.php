<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Dress and Attire',
                'slug' => 'dress-and-attire',
            ], [
                'name' => 'Ceremony Music',
                'slug' => 'ceremony-music',
            ], [
                'name' => 'Catering',
                'slug' => 'catering',
            ], [
                'name' => 'Cake',
                'slug' => 'cake',
            ], [
                'name' => 'Beauty and Health',
                'slug' => 'beauty-and-health',
            ], [
                'name' => 'Favors and Gifts',
                'slug' => 'favors-and-gifts',
            ],
        ];

        DB::table('categories')->insert($categories);

    }
}
