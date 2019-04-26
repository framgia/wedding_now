<?php

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

Route::get('/', 'HomeController@index')->name('home');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('login', 'AdminController@getAdminLogin')->middleware('guest')->name('login');

Route::post('login', 'AdminController@postAdminLogin')->name('login');

Route::get('lang/{lang}', 'HomeController@changeLang')->name('changeLang');

Route::group(['namespace' => 'User'], function () {

    Route::get('real-wedding', 'RealWeddingController@index')->name('real-wedding.index');

    // allow post and get method for this route
    Route::match(['get', 'post'], 'real-wedding-show', 'RealWeddingController@show')->name('real-wedding.show');

    Route::get('get-districts/{id}', 'UserController@getDistrictsById')->name('get.districts');

    Route::get('planning-package', 'ScheduleController@planningPackage')->name('planning-package');

    Route::group(['middleware' => 'auth'], function () {

        Route::get('to-do-list', 'ScheduleController@toDo')->name('client.to-do-list');

        Route::get('profile/{username}', 'UserController@userProfile')->name('user.profile');

        Route::put('update', 'UserController@update')->name('user.update');

        Route::get('load-to-do-list', 'ScheduleController@getToDoList')->name('client.get-to-do-list');

        Route::post('create-task', 'ScheduleController@createTask')->name('client.create-task');

        Route::delete('delete-task/{id}', 'ScheduleController@deleteTask')->name('client.delete-task');

        Route::get('load-item-by-category', 'ScheduleController@getItemByCategory')->name('client.get-item-by-category');

        Route::get('single-task/{id}', 'ScheduleController@getSingleTask')->name('client.get-single-task');

        Route::post('choose-type-schedule', 'ScheduleController@chooseTypeSchedule')->name('client.choose-type-schedule');

        Route::put('update-task', 'ScheduleController@updateTask')->name('client.update-task');

        Route::put('update-status-task/{id}', 'ScheduleController@updateStatusTask')->name('client.update-status-task');

        Route::get('category-filter', 'ScheduleController@getCategoryFilter')->name('client.get-filter-category');

        Route::get('schedule-info', 'ScheduleController@scheduleInfoView')->name('client.schedule');

        Route::get('get-schedule-info', 'ScheduleController@getScheduleInfo')->name('client.get-schedule-info');

        Route::post('upload-image-schedule', 'ScheduleController@changePicture')->name('client.schedule-upload-image');

        Route::post('update-schedule', 'ScheduleController@updateSchedule')->name('client.schedule-update');

        Route::get('suggestions', 'ScheduleController@suggestions')->name('user.suggest');

        Route::post('schedule', 'ScheduleController@store')->name('schedule.store');

        Route::get('schedule/{slug}', 'ScheduleController@show')->name('schedule.show');

        Route::get('search-venue/{keyword}', 'LocationController@getDistrict')->name('client.get-district');

        Route::delete('delete-schedule', 'ScheduleController@destroy')->name('client.delete-schedule');

        Route::get('design-card', 'CardController@index')->name('client.design-card');

        Route::get('load-card', 'CardController@getDesignCard')->name('client.load-card');

        Route::post('save-card', 'CardController@saveCard')->name('client.add-card');

        Route::post('choose-template', 'CardController@chooseTemplate')->name('client.choose-template');

        Route::get('timeline', 'ScheduleController@myTimeline')->name('client.my.timeline');
        
        Route::get('timeline/{slug}', 'ScheduleController@timelineRealWedding')->name('client.timeline');
        
        Route::get('get-item', 'ScheduleController@getItem')->name('client.get-item');
    });

    Route::group(['prefix' => 'news'], function() {

        Route::get('/', 'PostController@index')->name('post.index');

        Route::get('/loadMore', 'PostController@loadPostScrollPaginate')->name('post.loadMore');

        Route::get('/{topic}/{id}/{slug}', 'PostController@detailPost')->name('post.detail');
    });
});

Route::group(['namespace' => 'Admin'], function () {
    Route::group(['prefix' => 'news', 'middleware' => 'auth'], function() {
        Route::resource('posts', 'PostController')->except(['edit']);

        Route::get('posts-list', 'PostController@getAll')->name('posts.list');

        Route::delete('posts-delete-file/{file}', 'PostController@deleteFile')->name('posts.delete.file');

        Route::post('posts-send-file', 'PostController@sendFile')->name('posts.send.file');
    });
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'AdminController@index')->name('admin.index');

    Route::group(['namespace' => 'Admin'], function () {
        Route::resource('posts', 'PostController')->except(['edit']);

        Route::get('posts-list', 'PostController@getAll')->name('posts.list');

        Route::delete('posts-delete-file/{file}', 'PostController@deleteFile')->name('posts.delete.file');

        Route::post('posts-send-file', 'PostController@sendFile')->name('posts.send.file');

        Route::get('user-list', 'UserController@getList')->name('admin.user.list');

        Route::get('user', 'UserController@index')->name('admin.user.index');

        Route::put('user-update/{id}', 'UserController@update')->name('admin.user.update')->middleware(['permission:user-update']);

        Route::get('user/{id}', 'UserController@show')->name('admin.user.show');

        Route::get('user-list', 'UserController@getList')->name('admin.user.list');

        Route::post('user-create', 'UserController@store')->name('admin.user.store');

        Route::group(['prefix' => 'role', 'middleware' => ['role:admin']], function () {
            Route::resource('role', 'RoleController')->except([
                'create', 'edit', 'destroy',
            ]);;
            Route::get('role-delete/{id}', 'RoleController@destroy')->name('role.destroy');
            Route::get('role-list', 'RoleController@getRole')->name('role.getRole');
        });

        Route::get('list-schedule-default', 'ScheduleController@index')->name('admin.list-schedule-default');

        Route::get('list-schedule-default', 'ScheduleWeddingController@index')->name('admin.list-schedule-default');

        Route::get('create-schedule-default', 'ScheduleWeddingController@create')->name('admin.create-schedule-default');

        Route::get('schedule-default', 'ScheduleWeddingController@scheduleDefaultIndex')
            ->name('admin.schedule-default.index');

        Route::put('schedule-default/{id}', 'ScheduleWeddingController@scheduleDefaultUpdate')
            ->name('admin.schedule-default.update');

        Route::get('task-in-schedule', 'ScheduleWeddingController@getTasks')
            ->name('admin.task-in-schedule');

        Route::get('categories-pluck', 'ScheduleWeddingController@getCategoryPluck')
            ->name('admin.categories-pluck');

        Route::get('item-with-vendor-pluck-by-category', 'ScheduleWeddingController@getItemWithVendorPluckByIdCategory')
            ->name('admin.item-with-vendor-pluck-by-category');

        Route::get('time-frame-pluck', 'ScheduleWeddingController@getTimeFramePluck')
            ->name('admin.time-frame-pluck');
    });
});
