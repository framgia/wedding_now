<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TemplateCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cards = [];

        for ($i = 3; $i <= 11; $i++) {
            $cards[] = [
                'name' => 'image-background',
                'type' => 'template',
                'background_image' => 'wedding-card-' . $i . '.jpg',
            ];
        }

        DB::table('cards')->insert($cards);

        $metas = [];

        for ($i = 0; $i <= 6; $i++) {
            for ($j = 0; $j <= 3; $j++) {
                $metas[] = [
                    'card_id' => $i,
                    'div_style' => 'top: ' . random_int(100, 300) . 'px;left: ' . random_int(100, 300) . 'px; position: absolute',
                ];
            }
        }

        DB::table('card_metas')->insert($metas);
    }
}
