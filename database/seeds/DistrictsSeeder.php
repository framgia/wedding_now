<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $districts = [
            [
                'name' => 'Huyện Phong Điền',
                'city_id' => 1,
            ], [
                'name' => 'Huyện Cờ Đỏ',
                'city_id' => 1,
            ], [
                'name' => 'Huyện Thới Lai',
                'city_id' => 1,
            ], [
                'name' => 'Huyện Vĩnh Thạnh',
                'city_id' => 1,
            ], [
                'name' => 'Quận Bình Thủy',
                'city_id' => 1,
            ], [
                'name' => 'Huyện Hòa Vang',
                'city_id' => 2,
            ], [
                'name' => 'Huyện Hoàng Sa',
                'city_id' => 2,
            ], [
                'name' => 'Quận Cẩm Lệ',
                'city_id' => 2,
            ], [
                'name' => 'Quận Hải Châu',
                'city_id' => 2,
            ], [
                'name' => 'Quận Liên Chiểu',
                'city_id' => 2,
            ], [
                'name' => 'Huyện Ba Vì',
                'city_id' => 3,
            ], [
                'name' => 'Huyện Chương Mỹ',
                'city_id' => 3,
            ], [
                'name' => 'Huyện Đan Phượng',
                'city_id' => 3,
            ], [
                'name' => 'Huyện Đông Anh',
                'city_id' => 3,
            ], [
                'name' => 'Huyện Gia Lâm',
                'city_id' => 3,
            ], [
                'name' => 'Huyện An Dương',
                'city_id' => 4,
            ], [
                'name' => 'Huyện An Lão',
                'city_id' => 4,
            ], [
                'name' => 'Huyện Bạch Long Vĩ',
                'city_id' => 4,
            ], [
                'name' => 'Huyện Cát Hải',
                'city_id' => 4,
            ], [
                'name' => 'Huyện Kiến Thụy',
                'city_id' => 4,
            ], [
                'name' => 'Huyện Bình Chánh',
                'city_id' => 5,
            ], [
                'name' => 'Huyện Cần Giờ',
                'city_id' => 5,
            ], [
                'name' => 'Huyện An Phú',
                'city_id' => 6,
            ], [
                'name' => 'Huyện Châu Phú',
                'city_id' => 6,
            ], [
                'name' => 'Huyện Châu Đức',
                'city_id' => 7,
            ], [
                'name' => 'Huyện Côn Đảo',
                'city_id' => 7,
            ],
        ];

        DB::table('districts')->insert($districts);
    }
}
