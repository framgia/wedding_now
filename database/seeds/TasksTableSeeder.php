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
                'schedule_wedding_id' => 1
            ], [
                'name' => 'Đặt Xe',
                'priority' => 1,
                'category_id' => 2,
                'note' => 'Writing some things',
                'time_frame_id' => 1,
                'schedule_wedding_id' => 1
            ], [
                'name' => 'Đặt Váy',
                'priority' => 1,
                'category_id' => 3,
                'note' => 'Writing some things',
                'time_frame_id' => 1,
                'schedule_wedding_id' => 1
            ]
        ];

        DB::table('tasks')->insert($data);
    }
}
