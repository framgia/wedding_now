<?php

use Illuminate\Database\Seeder;
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
        factory(ScheduleWedding::class, 10)->states('default')->create();
        factory(ScheduleWedding::class, 1)->states('suggest')->create();
        factory(ScheduleWedding::class, 30)->states('package')->create();
        factory(ScheduleWedding::class, 40)->create();
    }
}
