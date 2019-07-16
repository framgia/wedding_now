<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopicsTableSeeder extends Seeder
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
                'name' => 'Planning Basics',
            ], [
                'name' => 'Wedding Ceremony',
            ], [
                'name' => 'Wedding Reception',
            ], [
                'name' => 'Wedding Services',
            ], [
                'name' => 'Health & Beauty',
            ], [
                'name' => 'Wedding Fashion',
            ], [
                'name' => 'Destination Weddings',
            ], [
                'name' => 'Family & Friends',
            ], [
                'name' => 'Events & Parties',
            ], [
                'name' => 'Married Life',
            ],
        ];

        DB::table('topics')->insert($data);

        $image = [
            'BELL.svg',
            'BRIDAL BOUQUET.svg',
            'CAKE.svg',
            'CAMERA.svg',
            'CHAMPAGNE.svg',
            'CHURCH.svg',
            'GIFT_2.svg',
            'JUST MARRIED.svg',
            'MUSIC.svg',
            'WEDDING LOCATION.svg'
        ];

        $topicsImage = [];

        $j = 0;

        for ($i = 0 ; $i < 10; $i++) {

            $topicsImage[] = [
                'name' =>  $image[$i],
                'mediaable_id' => ++$j,
                'mediaable_type' => 'App\Models\Topic',
            ];
        }

        DB::table('medias')->insert($topicsImage);
    }
}
