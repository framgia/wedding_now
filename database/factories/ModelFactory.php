<?php

use Faker\Generator as Faker;
use App\Models\User;
use App\Models\Location;
use App\Models\Item;
use App\Models\ScheduleWedding;
use App\Models\Task;
use Carbon\Carbon;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('123456'),
        'phone' => $faker->unique()->phoneNumber,
        'birthday' => Carbon::now(),
        'gender' => 'male',
        'user_name' => 'username' . rand(1, 10000),
        'remember_token' => str_random(10),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});

$factory->define(Location::class, function (Faker $faker) {
    return [
        'address' => 'abcdef',
        'locationable_id' => factory(App\Models\User::class)->create()->id,
        'locationable_type' => 'App\Models\User',
        'district_id' => rand(1, 812),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});

$factory->define(Item::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(3),
        'slug' => str_random(10),
        'description' => $faker->text(300),
        'price' => $faker->randomNumber(6),
        'user_id' => $faker->numberBetween(10, 99),
    ];
});

$factory->define(ScheduleWedding::class, function (Faker $faker) {
    return [
        'name' => 'Schedule Wedding of ' . factory(App\Models\User::class)->create()->name,
        'slug' => str_random(10),
        'user_id' => rand(1, 100),
        'type' => 'custom',
        'schedule_wedding_id' => null,
        'budget' => rand(50000000, 200000000),
        'note' =>  $faker->sentence(15),
        'final_cost' => rand(100000000, 200000000)
    ];
});

$factory->define(Task::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(5),
        'priority' => 0,
        'category_id' => rand(1, 11),
        'time_occurs' =>  $faker->dateTimeThisYear(),
        'time_frame_id' => 1,
        'note' =>  $faker->sentence(15),
        'schedule_wedding_id' => rand(3, 30)
    ];
});
