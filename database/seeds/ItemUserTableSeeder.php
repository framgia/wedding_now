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
        $data = [
            [
                'user_id' => 5,
                'item_id' => 1,
                'price' => 100,
            ], [
                'user_id' => 5,
                'item_id' => 2,
                'price' => 213,
            ], [
                'user_id' => 6,
                'item_id' => 3,
                'price' => 123,
            ], [
                'user_id' => 6,
                'item_id' => 2,
                'price' => 123,
            ], [
                'user_id' => 6,
                'item_id' => 4,
                'price' => 4234,
            ], [
                'user_id' => 7,
                'item_id' => 5,
                'price' => 234,
            ], [
                'user_id' => 8,
                'item_id' => 2,
                'price' => 345,
            ], [
                'user_id' => 7,
                'item_id' => 3,
                'price' => 234,
            ], [
                'user_id' => 9,
                'item_id' => 1,
                'price' => 567,
            ], [
                'user_id' => 9,
                'item_id' => 3,
                'price' => 100,
            ], [
                'user_id' => 5,
                'item_id' => 4,
                'price' => 100,
            ], [
                'user_id' => 5,
                'item_id' => 3,
                'price' => 100,
            ],
        ];

        DB::table('item_user')->insert($data);
    }
}
