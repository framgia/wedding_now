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

        Route::get('load-card', 'CardController@getCard')->name('client.load-card');

        Route::post('save-card', 'CardController@saveCard')->name('client.add-card');
        Route::get('timeline', 'ScheduleController@myTimeline')->name('client.my.timeline');
        Route::get('timeline/{slug}', 'ScheduleController@timeline')->name('client.timeline');
        Route::get('get-item', 'ScheduleController@getItem')->name('client.get-item');
    });

    Route::group(['prefix' => 'news'], function() {

        Route::get('/', 'PostController@index');

        Route::get('/loadMore', 'PostController@loadPostScrollPaginate')->name('post.loadMore');
    });
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'AdminController@index')->name('admin.index');

    Route::group(['namespace' => 'Admin'], function () {
        Route::get('user', 'UserController@index')->name('admin.user.index');
        Route::get('user-list', 'UserController@getList')->name('admin.user.list');
        Route::get('user-create', 'UserController@gcreate')->name('admin.user.create');
        Route::post('user-create', 'UserController@store')->name('admin.user.create');

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
