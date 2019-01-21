<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [];

        for ($i = 1; $i <= 5; $i++) {
            $items[] = [
                'name' => 'item ' . $i,
                'slug' => 'item-' . $i,
            ];
        }

        DB::table('items')->insert($items);
    }
}
