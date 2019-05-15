<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesSeeder extends Seeder
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
                'name' => 'Thành phố Cần Thơ',
                'slug' => 'Thành-phố-Cần-Thơ',
            ], [
                'name' => 'Thành phố Đà Nẵng',
                'v' => 'Thành-phố-Đà-Nẵng',
            ], [
                'name' => 'Thành phố Hà Nội',
                'slug' => 'Thành-phố-Hà-Nội',
            ], [
                'name' => 'Thành phố Hải Phòng',
                'slug' => 'Thành-phố-Hải-Phòng',
            ], [
                'name' => 'Thành phố Hồ Chí Minh',
                'slug' => 'Thành-phố-Hồ-Chí-Minh',
            ], [
                'name' => 'Tỉnh An Giang',
                'slug' => 'Tỉnh-An-Giang',
            ], [
                'name' => 'Tỉnh Bà Rịa-Vũng Tàu',
                'slug' => 'Tỉnh-Bà-Rịa-Vũng-Tàu',
            ],
        ];

        DB::table('cities')->insert($cities);
    }
}
