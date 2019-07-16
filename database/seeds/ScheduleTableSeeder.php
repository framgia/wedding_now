<?php

use Illuminate\Database\Seeder;
use App\Models\Schedule;
use Carbon\Carbon;

class ScheduleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        factory(Schedule::class, 12)->states('default')->create()->each(function ($schedule) use ($faker) {

            $schedule->tasks()->create([
                'name' => $faker->realText(20),
                'priority' => random_int(0, 1),
                'category_id' => random_int(1, 11),
                'note' => 'Writing some things',
                'time_frame_id' => random_int(1, 4),
                'schedule_id' => $schedule->id,
                'time_occurs' => Carbon::now(),
            ]);
        });

        factory(Schedule::class, 1)->states('suggest')->create();

        factory(Schedule::class, 3)->states('package')->create();

        factory(Schedule::class, 11)->create();
    }
}
