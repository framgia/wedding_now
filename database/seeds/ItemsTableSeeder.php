<?php

use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\ItemUser;
use Carbon\Carbon;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        factory(Item::class, 100)->create()->each(function ($item) use ($faker) {
            $item->locations()->create([
                'address' => $faker->address,
                'locationable_id' => $item->id,
                'locationable_type' => 'App\Models\Item',
                'district_id' => rand(1, 26),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        });
    }
}
