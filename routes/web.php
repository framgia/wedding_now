<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Auth::routes(['verify' => true]);

Route::group(['namespace' => 'User', 'as' => 'client.'], function () {

    Route::get('/', 'HomeController@index')
        ->name('home');

    Route::get('lang/{lang}', 'HomeController@changeLang')
        ->name('changeLang');

    Route::group(['prefix' => 'login-social'], function () {
        Route::get('{social}/redirect', 'SocialAuthController@redirect')
            ->name('login-with-account-social-redirect');

        Route::get('{social}/callback', 'SocialAuthController@callback')
            ->name('login-with-account-social-callback');
    });

    Route::group(['prefix' => 'real-wedding'], function () {

        Route::get('/', 'RealWeddingController@index')
            ->name('real-wedding.index');

        Route::get('load', 'RealWeddingController@loadFilterRealWedding')
            ->name('real-wedding.load');

        Route::get('detail/{id}/{slug}', 'RealWeddingController@detail')
            ->name('real-wedding.detail');

        Route::post('copy', 'RealWeddingController@copySchedule')
            ->name('real-wedding.copy');
    });

    Route::group(['prefix' => 'package'], function () {

        Route::get('/{slug}/{id}', 'PackageController@detail')
            ->name('package.detail');
    });

    Route::group(['prefix' => 'location'], function () {

        Route::get('get-districts/{id}', 'LocationController@getDistrictsById')
            ->name('get.districts');

        Route::get('search-location/{keyword}', 'LocationController@searchLocation')
            ->name('get-district');
    });

    Route::group(['middleware' => 'auth'], function () {

        Route::group(['prefix' => 'schedule'], function () {

            Route::get('my-schedule', 'ScheduleController@toDo')
                ->name('to-do-list');

            Route::post('select-schedule-default', 'ScheduleController@selectScheduleDefault')
                ->name('select-schedule-default');

            Route::get('load-to-do-list', 'ScheduleController@getToDoList')
                ->name('get-to-do-list');

            Route::post('choose-type-schedule', 'ScheduleController@chooseTypeSchedule')
                ->name('choose-type-schedule');

            Route::get('category-filter', 'ScheduleController@getCategoryFilter')
                ->name('get-filter-category');

            Route::get('schedule-info', 'ScheduleController@scheduleInfoView')
                ->name('schedule');

            Route::get('get-schedule-info', 'ScheduleController@getScheduleInfo')
                ->name('get-schedule-info');

            Route::post('upload-image-schedule', 'ScheduleController@changePicture')
                ->name('schedule-upload-image');

            Route::post('update-schedule', 'ScheduleController@updateSchedule')
                ->name('schedule-update');

            Route::get('schedule/{slug}', 'ScheduleController@show')
                ->name('schedule.show');

            Route::delete('delete-schedule', 'ScheduleController@destroy')
                ->name('delete-schedule');

            Route::get('timeline/{slug}', 'ScheduleController@timelineRealWedding')
                ->name('timeline');

            Route::get('planning-package', 'ScheduleController@planningPackage')
                ->name('planning-package');
        });

        Route::group(['prefix' => 'task'], function () {

            Route::post('create-task', 'TaskController@createTask')
                ->name('create-task');

            Route::delete('delete-task/{id}', 'TaskController@deleteTask')
                ->name('delete-task');

            Route::get('single-task/{id}', 'TaskController@getSingleTask')
                ->name('get-single-task');

            Route::put('update-task', 'TaskController@updateTask')
                ->name('update-task');

            Route::put('update-status-task/{id}', 'TaskController@updateStatusTask')
                ->name('update-status-task');
        });

        Route::group(['prefix' => 'suggestions'], function () {

            Route::get('/', 'SuggestionController@index')
                ->name('suggestion.index');

            Route::post('save', 'SuggestionController@store')
                ->name('suggestion.store');
        });

        Route::group(['prefix' => 'profile'], function () {

            Route::get('profile', 'UserController@userProfile')
                ->name('user.profile');

            Route::put('update', 'UserController@update')
                ->name('user.update');
        });

        Route::group(['prefix' => 'design-card'], function () {

            Route::get('', 'CardController@index')
                ->name('design-card');

            Route::get('load-card', 'CardController@getDesignCard')
                ->name('load-card');

            Route::get('create-page', 'CardController@createPage')
                ->name('create-page');

            Route::get('get-templates', 'CardController@getTemplates')
                ->name('get-templates');

            Route::put('save-card', 'CardController@saveCard')
                ->name('save-card');

            Route::get('choose-template', 'CardController@chooseTemplate')
                ->name('choose-template');

            Route::put('update-name', 'CardController@updateName')
                ->name('update-name-card');

            Route::post('choose-orientation', 'CardController@chooseOrientation')
                ->name('choose-orientation');
        });

        Route::group(['prefix' => 'timeline'], function () {

            Route::get('', 'ScheduleController@myTimeline')
                ->name('my-timeline');

            Route::post('update/note', 'TaskController@updateNoteTimeLine')
                ->name('my-timeline.update.note');

            Route::post('update/date', 'TaskController@updateDateTimeLine')
                ->name('my-timeline.update.date');

            Route::post('update/priority', 'TaskController@updatePriorityTimeLine')
                ->name('my-timeline.update.priority');
        });

        Route::group(['prefix' => 'item'], function () {

            Route::get('get-item', 'ItemController@getItem')
                ->name('get-item');

            Route::get('load-item-by-category', 'ItemController@getItemByCategory')
                ->name('get-item-by-category');

            Route::get('load-item-by-keyword', 'ItemController@seachItem')
                ->name('get-item-by-keyword');
        });
    });

    Route::group(['prefix' => 'news', 'as' => 'post.'], function () {

        Route::get('/', 'PostController@index')
            ->name('index');

        Route::get('/loadMore', 'PostController@loadPostScrollPaginate')
            ->name('loadMore');

        Route::get('/{topic}/{id}/{slug}', 'PostController@detailPost')
            ->name('detail')
            ->middleware('filter.view.post');

        Route::post('comment', 'PostController@comment')
            ->name('comment');

        Route::get('reply', 'PostController@replyView')
            ->name('reply-view');

        Route::get('load-reply/{id}', 'PostController@loadReply')
            ->name('load-reply');

        Route::post('reply', 'PostController@reply')
            ->name('reply');
    });
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['role:admin']], function () {

    Route::get('/', 'HomeController@index')
        ->name('index');

    Route::group(['prefix' => 'post', 'as' => 'post.'], function () {

        Route::get('/', 'PostController@index')
            ->name('index');

        Route::get('get-data', 'PostController@getAll')
            ->name('get-data');

        Route::get('create', 'PostController@create')
            ->name('create');

        Route::post('store', 'PostController@store')
            ->name('store');

        Route::get('{id}/show', 'PostController@show')
            ->name('show');

        Route::get('{id}/edit', 'PostController@edit')
            ->name('edit');

        Route::put('update/{id}', 'PostController@update')
            ->name('update');

        Route::delete('{id}', 'PostController@destroy')
            ->name('destroy');

        Route::get('get-all-tag-pluck', 'TagController@getAllTag')
            ->name('get-all-tag-pluck');
    });

    Route::group(['prefix' => 'role', 'as' => 'role.'], function () {

        Route::get('/', 'RoleController@index')
            ->name('index');

        Route::get('get-data', 'RoleController@getAll')
            ->name('get-data');

        Route::get('create', 'RoleController@create')
            ->name('create');

        Route::post('store', 'RoleController@store')
            ->name('store');

        Route::get('{id}/show', 'RoleController@show')
            ->name('show');

        Route::get('{id}/edit', 'RoleController@edit')
            ->name('edit');

        Route::put('update/{id}', 'RoleController@update')
            ->name('update');

        Route::delete('{id}', 'RoleController@destroy')
            ->name('destroy');
    });

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {

        Route::get('', 'UserController@index')
            ->name('index');

        Route::get('get-data', 'UserController@getAll')
            ->name('get-data');

        Route::get('create', 'UserController@create')
            ->name('create');

        Route::post('store', 'UserController@store')
            ->name('store');

        Route::get('{id}/show', 'UserController@show')
            ->name('show');

        Route::get('{id}/edit', 'UserController@edit')
            ->name('edit');

        Route::put('update/{id}', 'UserController@update')
            ->name('update');

        Route::delete('{id}', 'UserController@destroy')
            ->name('destroy');
    });

    Route::group(['prefix' => 'city'], function () {

        Route::get('get-district', 'CityController@getDistrict')
            ->name('city.get-district');
    });

    Route::group(['prefix' => 'schedule'], function () {

        Route::group(['prefix' => 'default', 'as' => 'schedule-default.'], function () {

            Route::get('/', 'ScheduleController@indexScheduleDefault')
                ->name('index');

            Route::get('/get-data', 'ScheduleController@getDataScheduleDefault')
                ->name('get-data');

            Route::get('/{id}/show', 'ScheduleController@showScheduleDefault')
                ->name('show');

            Route::get('/create', 'ScheduleController@createScheduleDefault')
                ->name('create');

            Route::get('/{id}/edit', 'ScheduleController@showScheduleDefault')
                ->name('edit');
        });
    });

    Route::get('categories-pluck', 'ScheduleController@getCategoryPluck')
        ->name('categories-pluck');

    Route::get('item-with-vendor-pluck-by-category', 'ScheduleController@getItemWithVendorPluckByIdCategory')
        ->name('item-with-vendor-pluck-by-category');

    Route::get('time-frame-pluck', 'ScheduleController@getTimeFramePluck')
        ->name('time-frame-pluck');
});
