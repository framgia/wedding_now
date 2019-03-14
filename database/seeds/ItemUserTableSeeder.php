<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $itemUser = [];
        for ($i = 0; $i < 100; $i++) {
            $itemUser[] = [
                'user_id' => rand(1, 100),
                'item_id' => rand(1, 100),
                'price' => rand(500, 100000)
            ];
        }
        DB::table('item_user')->insert($itemUser);
    }
}
