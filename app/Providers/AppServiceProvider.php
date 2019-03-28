<?php

namespace App\Providers;

use Auth;
use App\Models\Topic;
use App\Repositories\Topic\TopicRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer(['admin.header'], function ($view) {
            $user = Auth::user()->load('media');
            $view->with('user', $user);
        });

        view()->composer(['user.post'], function ($view) {
            $topic = new Topic();
            $topicRepo = new TopicRepository($topic);
            $topics = $topicRepo->checkImageCollection($topicRepo->getData(['media']), config('define.post.topic.path'), config('define.post.topic.default_image'));
            $view->with('topics', $topics);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
