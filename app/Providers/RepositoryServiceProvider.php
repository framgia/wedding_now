<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected static $repositories = [
        [
            'App\Repositories\User\UserRepository',
            'App\Repositories\User\UserRepositoryInterface',
        ], [
            'App\Repositories\BaseRepository',
            'App\Repositories\RepositoryInterface',
        ], [
            'App\Repositories\ScheduleWedding\ScheduleWeddingRepository',
            'App\Repositories\ScheduleWedding\ScheduleWeddingRepositoryInterface',
        ], [
            'App\Repositories\Card\CardRepository',
            'App\Repositories\Card\CardRepositoryInterface',
        ], [
            'App\Repositories\CardMeta\CardMetaRepository',
            'App\Repositories\CardMeta\CardMetaRepositoryInterface',
        ], [
            'App\Repositories\Category\CategoryRepository',
            'App\Repositories\Category\CategoryRepositoryInterface',
        ], [
            'App\Repositories\District\DistrictRepository',
            'App\Repositories\District\DistrictRepositoryInterface',
        ], [
            'App\Repositories\Item\ItemRepository',
            'App\Repositories\Item\ItemRepositoryInterface',
        ], [
            'App\Repositories\Location\LocationRepository',
            'App\Repositories\Location\LocationRepositoryInterface',
        ], [
            'App\Repositories\Media\MediaRepository',
            'App\Repositories\Media\MediaRepositoryInterface',
        ], [
            'App\Repositories\ScheduleMeta\ScheduleMetaRepository',
            'App\Repositories\ScheduleMeta\ScheduleMetaRepositoryInterface',
        ], [
            'App\Repositories\Task\TaskRepository',
            'App\Repositories\Task\TaskRepositoryInterface',
        ], [
            'App\Repositories\TimeFrame\TimeFrameRepository',
            'App\Repositories\TimeFrame\TimeFrameRepositoryInterface',
        ], [
            'App\Repositories\Role\RoleRepository',
            'App\Repositories\Role\RoleRepositoryInterface',
        ]
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
            $this->app->bind(
                $repository[0],
                $repository[1]
            );
        }
    }
}
