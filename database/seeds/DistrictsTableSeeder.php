<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $districts = [];
        for ($i = 0; $i < 10; $i++) {
            $counties[] = [
                'name' => 'District ' . $i,
                'city_id' => rand(1, 4),
            ];
        }

        DB::table('districts')->insert($districts);
    }
}
