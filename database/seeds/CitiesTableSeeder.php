<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            [
                'name' => 'New York',
                'slug' => 'new-york',
            ], [
                'name' => 'Paris',
                'slug' => 'paris',
            ], [
                'name' => 'Tokyo',
                'slug' => 'tokyo',
            ], [
                'name' => 'Ha Noi',
                'slug' => 'ha-noi',
            ],
        ];

        DB::table('cities')->insert($cities);
    }
}
