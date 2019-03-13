<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksTableSeeder extends Seeder
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
                'name' => 'Đặt Bánh',
                'priority' => 1,
                'category_id' => 1,
                'note' => 'Writing some things',
                'time_frame_id' => 1,
                'schedule_wedding_id' => 1,
            ], [
                'name' => 'Đặt Xe',
                'priority' => 1,
                'category_id' => 2,
                'note' => 'Writing some things',
                'time_frame_id' => 1,
                'schedule_wedding_id' => 1,
            ], [
                'name' => 'Đặt Váy',
                'priority' => 1,
                'category_id' => 3,
                'note' => 'Writing some things',
                'time_frame_id' => 1,
                'schedule_wedding_id' => 1,
            ], [
                'name' => 'Địa điểm',
                'priority' => 1,
                'category_id' => 1,
                'note' => 'Writing some things',
                'time_frame_id' => 1,
                'schedule_wedding_id' => 2,
            ], [
                'name' => 'Đồ ăn',
                'priority' => 1,
                'category_id' => 2,
                'note' => 'Writing some things',
                'time_frame_id' => 1,
                'schedule_wedding_id' => 2,
            ], [
                'name' => 'Nhiếp ảnh',
                'priority' => 1,
                'category_id' => 3,
                'note' => 'Writing some things',
                'time_frame_id' => 1,
                'schedule_wedding_id' => 2,
            ], [
                'name' => 'Hoa',
                'priority' => 1,
                'category_id' => 4,
                'note' => 'Writing some things',
                'time_frame_id' => 1,
                'schedule_wedding_id' => 2,
            ], [
                'name' => 'Bánh',
                'priority' => 1,
                'category_id' => 5,
                'note' => 'Writing some things',
                'time_frame_id' => 1,
                'schedule_wedding_id' => 2,
            ], [
                'name' => 'Trang phục',
                'priority' => 1,
                'category_id' => 6,
                'note' => 'Writing some things',
                'time_frame_id' => 1,
                'schedule_wedding_id' => 2,
            ], [
                'name' => 'DJ',
                'priority' => 1,
                'category_id' => 7,
                'note' => 'Writing some things',
                'time_frame_id' => 1,
                'schedule_wedding_id' => 2,
            ], [
                'name' => 'Quay Phim',
                'priority' => 1,
                'category_id' => 8,
                'note' => 'Writing some things',
                'time_frame_id' => 1,
                'schedule_wedding_id' => 2,
            ], [
                'name' => 'Nhạc',
                'priority' => 1,
                'category_id' => 9,
                'note' => 'Writing some things',
                'time_frame_id' => 1,
                'schedule_wedding_id' => 2,
            ], [
                'name' => 'Trang điểm',
                'priority' => 1,
                'category_id' => 10,
                'note' => 'Writing some things',
                'time_frame_id' => 1,
                'schedule_wedding_id' => 2,
            ], [
                'name' => 'Khác',
                'priority' => 1,
                'category_id' => 11,
                'note' => 'Writing some things',
                'time_frame_id' => 1,
                'schedule_wedding_id' => 2,
            ]
        ];

        DB::table('tasks')->insert($data);
    }
}
