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

        $schedule_weddings = [
            [
                'name' => 'Schedule Wedding Default',
                'slug' => 'schedule-wedding-default',
                'user_id' => 1,
                'type' => 'default',
                'schedule_wedding_id' => null,
                'budget' => 0,
                'note' => null,
            ],
            [
                'name' => 'Schedule Wedding Suggest',
                'slug' => 'schedule-wedding-suggest',
                'user_id' => 1,
                'type' => 'suggest',
                'schedule_wedding_id' => null,
                'budget' => 50000000,
                'note' => null,
            ]
        ];

        for ($i = 0; $i < 40; $i++) {
            $schedule_weddings[] = [
                'name' => 'Schedule Wedding ' . $i,
                'slug' => 'schedule-wedding-' . $i,
                'user_id' => 1,
                'type' => 'custom',
                'schedule_wedding_id' => null,
                'budget' => 0,
                'note' => null,
                'final_cost' => rand(100000000, 200000000)
            ];
        }

        DB::table('schedule_weddings')->insert($schedule_weddings);
    }
}
