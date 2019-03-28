<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
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
                'name' => 'Budget',
            ], [
                'name' => 'Trends & Tips',
            ], [
                'name' => 'Etiquette',
            ], [
                'name' => 'Officiants',
            ], [
                'name' => 'Vows & Readings',
            ], [
                'name' => 'Traditions',
            ], [
                'name' => 'Wedding Party',
            ], [
                'name' => 'Wedding Guest',
            ],
        ];

        DB::table('tags')->insert($data);
    }
}
