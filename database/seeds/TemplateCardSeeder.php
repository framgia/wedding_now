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

        for ($i = 1; $i <= 3; $i++) {
            $cards[] = [
                'name' => 'template-demo',
                'type' => 'template',
                'orientation' => 'vertical',
                'present_img' => 'card-vertical-' . $i . '.png',
            ];
        }

        DB::table('cards')->insert($cards);

        $pages = [];

        for ($i = 1; $i <= 3; $i++) {
            for ($j = 1; $j <= 4; $j++) {
                $pages[] = [
                    'card_id' => $i,
                    'background' => 'wedding-card-' . $i . '.png',
                ];
            }
        }

        DB::table('page_cards')->insert($pages);

        for ($i = 1; $i <= 12; $i += 4) {
            $metas = [
                [
                    'page_card_id' => $i,
                    'div_style' => 'position: absolute;left: 70px;top: 40px;',
                    'textarea_style' => 'font-size: 28px; height: 59px; opacity: 1; width: 149px; font-family: caviar; color: rgb(140, 82, 255);width: 220px;',
                    'content' => 'WEDDING NOW',
                ], [
                    'page_card_id' => $i,
                    'div_style' => 'position: absolute; left: 14px; top: 159px;',
                    'textarea_style' => 'font-size: 28px; height: 59px; opacity: 1; width: 119px; font-family: mussica; color: rgb(255, 87, 87);width: 186px;',
                    'content' => 'Groom name',
                ], [
                    'page_card_id' => $i,
                    'div_style' => 'position: absolute; left: 131px; top: 201px;',
                    'textarea_style' => 'font-size: 28px; height: 59px; opacity: 1; width: 80px; color: rgb(201, 226, 101);',
                    'content' => 'vs',
                ], [
                    'page_card_id' => $i,
                    'div_style' => 'position: absolute; left: 160px; top: 264px;',
                    'textarea_style' => 'font-size: 28px; height: 59px; opacity: 1; width: 121px; font-family: mussica; color: rgb(255, 87, 87);width: 175px;',
                    'content' => 'Bride name',
                ], [
                    'page_card_id' => $i,
                    'div_style' => 'position: absolute; left: 118px; top: 341px;',
                    'textarea_style' => 'font-size: 16px; height: 59px; opacity: 1; width: 107px; font-family: aleo; color: rgb(56, 182, 255);',
                    'content' => '22/12/2090',
                ], [
                    'page_card_id' => $i,
                    'div_style' => 'position: absolute; left: 85px; top: 412px;',
                    'textarea_style' => 'font-size: 16px; height: 45px; opacity: 1; width: 169px; font-family: geotica;',
                    'content' => 'Cầu Giấy, Hà Nội',
                ],
            ];

            DB::table('card_metas')->insert($metas);
        }
    }
}
