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
                'name' => 'Địa điểm',
                'slug' => 'dia-diem',
            ], [
                'name' => 'Phục vụ',
                'slug' => 'phuc-vu',
            ], [
                'name' => 'Nhiếp ảnh',
                'slug' => 'nhiep-anh',
            ], [
                'name' => 'Hoa',
                'slug' => 'hoa',
            ], [
                'name' => 'Bánh',
                'slug' => 'banh',
            ],[
                'name' => 'Trang phục',
                'slug' => 'trang-phuc',
            ], [
                'name' => 'DJ',
                'slug' => 'dj',
            ], [
                'name' => 'Quay phim',
                'slug' => 'quay-phim',
            ], [
                'name' => 'Nhạc',
                'slug' => 'nhac',
            ], [
                'name' => 'Trang điểm',
                'slug' => 'trang-diem',
            ], [
                'name' => 'Khác',
                'slug' => 'khac',
            ]
        ];

        DB::table('categories')->insert($categories);

    }
}
