<?php

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        factory(Post::class, 100)->create()->each(function ($post) use ($faker) {

            $post->rates()->create([
                'star' => random_int(1, 5),
                'content' => 'Good !',
                'user_id' => random_int(1, 5),
                'rateable_id' => $post->id,
                'rateable_type' => 'App\Models\Post',
            ]);

            $post->medias()->create([
                'name' => $faker->randomElement(['news-1.jpg', 'news-2.jpg', 'news-3.jpg', 'news-4.jpg', 'news-5.jpg', 'news-6.jpg']),
                'mediaable_id' => $post->id,
                'mediaable_type' => 'App\Models\Post',
                'type' => 'image',
            ]);

            $post->comments()->create([
                'content' => $faker->realText('100'),
                'user_id' => random_int(1, 5),
                'commentable_id' => $post,
                'commentable_type' => 'App\Models\Post',
                'comment_id' => $faker->randomElement([null, 1, 2, 3]),
                'created_at' => \Carbon\Carbon::now(),
            ]);
        });
    }
}
