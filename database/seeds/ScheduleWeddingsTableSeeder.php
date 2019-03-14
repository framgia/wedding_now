<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ScheduleWedding;

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

        DB::table('schedule_weddings')->insert($schedule_weddings);
        factory(ScheduleWedding::class, 40)->create();
    }
}
