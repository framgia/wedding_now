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

        for ($i = 0; $i <= 5; $i++) {
            $schedule_weddings[] = [
                'name' => 'Wedding What ?',
                'marriage_day' => '2018/12/12',
                'slug' => 'wedding-what-?',
                'user_id' => 1,
                'type' => 'administrator',
                'schedule_wedding_id' => 1,
                'budget' => 1000000,
                'note' => 'Nothing',
            ];
        }

        DB::table('schedule_weddings')->insert($schedule_weddings);
    }
}
