<?php

use Faker\Generator as Faker;
use App\Models\User;
use App\Models\Location;
use App\Models\Item;
use App\Models\Schedule;
use App\Models\Task;
use App\Models\Post;
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
        'district_id' => rand(1, 26),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});

$factory->define(Item::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(3),
        'slug' => str_random(10),
        'description' => $faker->realText(300),
    ];
});

$factory->define(Schedule::class, function (Faker $faker) {
    return [
        'name' => 'Schedule Wedding of ' . factory(App\Models\User::class)->create()->name,
        'slug' => str_random(10),
        'user_id' => rand(1, 28),
        'type' => 'custom',
        'schedule_id' => null,
        'budget' => rand(50000000, 200000000),
        'note' =>  $faker->sentence(15),
        'final_cost' => rand(100000000, 200000000),
    ];
});

$factory->state(Schedule::class, 'default', [
    'type' => 'default',
    'user_id' => 1,
]);

$factory->state(Schedule::class, 'suggest', [
    'type' => 'suggest',
    'user_id' => 1,
]);

$factory->state(Schedule::class, 'package', [
    'type' => 'package',
    'user_id' => 1,
]);

$factory->define(Task::class, function (Faker $faker) {
    return [
        'name' => $faker->realText(50),
        'priority' => 0,
        'category_id' => rand(1, 11),
        'time_occurs' =>  $faker->dateTimeThisYear(),
        'time_frame_id' => 1,
        'note' =>  $faker->realText(15),
        'schedule_id' => rand(8, 17),
    ];
});

$factory->define(Post::class, function(Faker $faker) {
    return [
        'title' => $faker->realText(100),
        'content' => $faker->realText(1000),
        'user_id' => 1,
        'slug' => $faker->text(100),
        'topic_id' => $faker->randomElement([1, 2, 3, 4]),
        'brief' => $faker->realText(191),
        'status' => 'public',
        'type' => $faker->randomElement(['schedule', 'item', 'location', 'feedback', 'thinks']),
    ];
});

$factory->define(Comment::class, function(Faker $faker) {
    return [
        'content' => $faker->realText(1000),
        'user_id' => 1,
    ];
});
