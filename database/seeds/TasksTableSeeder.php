<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Task;
use Carbon\Carbon;

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
                'time_occurs' => Carbon::now()
            ], [
                'name' => 'Đặt Xe',
                'priority' => 1,
                'category_id' => 2,
                'note' => 'Writing some things',
                'time_frame_id' => 1,
                'schedule_wedding_id' => 1,
                'time_occurs' => Carbon::now()->addDays(1)
            ], [
                'name' => 'Đặt Váy',
                'priority' => 1,
                'category_id' => 3,
                'note' => 'Writing some things',
                'time_frame_id' => 1,
                'schedule_wedding_id' => 1,
                'time_occurs' => Carbon::now()->addDays(2)
            ], [
                'name' => 'Địa điểm',
                'priority' => 1,
                'category_id' => 1,
                'note' => 'Writing some things',
                'time_frame_id' => 1,
                'schedule_wedding_id' => 2,
                'time_occurs' => Carbon::now()->addDays(1)
            ], [
                'name' => 'Đồ ăn',
                'priority' => 1,
                'category_id' => 2,
                'note' => 'Writing some things',
                'time_frame_id' => 1,
                'schedule_wedding_id' => 2,
                'time_occurs' => Carbon::now()->addDays(2)
            ], [
                'name' => 'Nhiếp ảnh',
                'priority' => 1,
                'category_id' => 3,
                'note' => 'Writing some things',
                'time_frame_id' => 1,
                'schedule_wedding_id' => 2,
                'time_occurs' => Carbon::now()->addDays(3)
            ], [
                'name' => 'Hoa',
                'priority' => 1,
                'category_id' => 4,
                'note' => 'Writing some things',
                'time_frame_id' => 1,
                'schedule_wedding_id' => 2,
                'time_occurs' => Carbon::now()->addDays(4)
            ], [
                'name' => 'Bánh',
                'priority' => 1,
                'category_id' => 5,
                'note' => 'Writing some things',
                'time_frame_id' => 1,
                'schedule_wedding_id' => 2,
                'time_occurs' => Carbon::now()->addDays(5)
            ], [
                'name' => 'Trang phục',
                'priority' => 1,
                'category_id' => 6,
                'note' => 'Writing some things',
                'time_frame_id' => 1,
                'schedule_wedding_id' => 2,
                'time_occurs' => Carbon::now()->addDays(6)
            ], [
                'name' => 'DJ',
                'priority' => 1,
                'category_id' => 7,
                'note' => 'Writing some things',
                'time_frame_id' => 1,
                'schedule_wedding_id' => 2,
                'time_occurs' => Carbon::now()->addDays(7)
            ], [
                'name' => 'Quay Phim',
                'priority' => 1,
                'category_id' => 8,
                'note' => 'Writing some things',
                'time_frame_id' => 1,
                'schedule_wedding_id' => 2,
                'time_occurs' => Carbon::now()->addDays(8)
            ], [
                'name' => 'Nhạc',
                'priority' => 1,
                'category_id' => 9,
                'note' => 'Writing some things',
                'time_frame_id' => 1,
                'schedule_wedding_id' => 2,
                'time_occurs' => Carbon::now()->addDays(9)
            ], [
                'name' => 'Trang điểm',
                'priority' => 1,
                'category_id' => 10,
                'note' => 'Writing some things',
                'time_frame_id' => 1,
                'schedule_wedding_id' => 2,
                'time_occurs' => Carbon::now()->addDays(10)
            ], [
                'name' => 'Khác',
                'priority' => 1,
                'category_id' => 11,
                'note' => 'Writing some things',
                'time_frame_id' => 1,
                'schedule_wedding_id' => 2,
                'time_occurs' => Carbon::now()->addDays(11)
            ]
        ];

        DB::table('tasks')->insert($data);
        factory(Task::class, 40)->create();
    }
}
