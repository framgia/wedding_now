<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeFramesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time_frames = [
            [
                'time_frame' => '1 day',
                'value' => '1',
            ], [
                'time_frame' => '3 to 4 day',
                'value' => '2',
            ], [
                'time_frame' => '1 week',
                'value' => '7',
            ], [
                'time_frame' => '1 month',
                'value' => '30',
            ],
        ];

        DB::table('time_frames')->insert($time_frames);
    }
}
