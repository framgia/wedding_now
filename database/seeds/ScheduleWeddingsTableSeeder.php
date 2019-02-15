<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleWeddingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schedule_weddings = [];

        $schedule_weddings[] = [
            'name' => 'Schedule Wedding Default',
            'marriage_day' => '2018/12/12',
            'slug' => 'schedule-wedding-default',
            'user_id' => 1,
            'type' => 'default',
            'schedule_wedding_id' => null,
            'budget' => 0,
            'note' => null,
        ];

        DB::table('schedule_weddings')->insert($schedule_weddings);
    }
}
