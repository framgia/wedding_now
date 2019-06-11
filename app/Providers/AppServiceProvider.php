<?php

namespace App\Providers;

use App\Models\Category;
use Auth;
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

        view()->composer(['layouts.section.banner'], function ($view) {
           $categories = Category::all()->pluck('name', 'id');
           $view->with('categories', $categories);
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
