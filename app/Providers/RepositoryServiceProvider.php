<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected static $repositories = [
        [
            'App\Repositories\Post\PostRepositoryInterface',
            'App\Repositories\Post\PostRepository',
        ], [
            'App\Repositories\User\UserRepositoryInterface',
            'App\Repositories\User\UserRepository',
        ], [
            'App\Repositories\Schedule\ScheduleRepositoryInterface',
            'App\Repositories\Schedule\ScheduleRepository',
        ], [
            'App\Repositories\Card\CardRepositoryInterface',
            'App\Repositories\Card\CardRepository',
        ], [
            'App\Repositories\CardMeta\CardMetaRepositoryInterface',
            'App\Repositories\CardMeta\CardMetaRepository',
        ], [
            'App\Repositories\Category\CategoryRepositoryInterface',
            'App\Repositories\Category\CategoryRepository',
        ], [
            'App\Repositories\District\DistrictRepositoryInterface',
            'App\Repositories\District\DistrictRepository',
        ], [
            'App\Repositories\Item\ItemRepositoryInterface',
            'App\Repositories\Item\ItemRepository',
        ], [
            'App\Repositories\Location\LocationRepositoryInterface',
            'App\Repositories\Location\LocationRepository',
        ], [
            'App\Repositories\Media\MediaRepositoryInterface',
            'App\Repositories\Media\MediaRepository',
        ], [
            'App\Repositories\ScheduleMeta\ScheduleMetaRepositoryInterface',
            'App\Repositories\ScheduleMeta\ScheduleMetaRepository',
        ], [
            'App\Repositories\Task\TaskRepositoryInterface',
            'App\Repositories\Task\TaskRepository',
        ], [
            'App\Repositories\TimeFrame\TimeFrameRepositoryInterface',
            'App\Repositories\TimeFrame\TimeFrameRepository',
        ], [
            'App\Repositories\Role\RoleRepositoryInterface',
            'App\Repositories\Role\RoleRepository',
        ], [
            'App\Repositories\Item\ItemRepositoryInterface',
            'App\Repositories\Item\ItemRepository',
        ], [
            'App\Repositories\Tag\TagRepositoryInterface',
            'App\Repositories\Tag\TagRepository',
        ], [
            'App\Repositories\Topic\TopicRepositoryInterface',
            'App\Repositories\Topic\TopicRepository',
        ], [
            'App\Repositories\City\CityRepositoryInterface',
            'App\Repositories\City\CityRepository',
        ], [
            'App\Repositories\PageCard\PageCardRepositoryInterface',
            'App\Repositories\PageCard\PageCardRepository',
        ], [
            'App\Repositories\Permission\PermissionRepositoryInterface',
            'App\Repositories\Permission\PermissionRepository',
        ], [
            'App\Repositories\Comment\CommentRepositoryInterface',
            'App\Repositories\Comment\CommentRepository',
        ],
    ];

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach (static::$repositories as $repository) {
            $this->app->bind($repository[0], $repository[1]);
        }
    }
}
