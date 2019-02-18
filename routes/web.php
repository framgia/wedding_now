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
    Route::get('get-districts/{id}', 'UserController@getDistrictsById')->name('get.districts');
    Route::group(['middleware' => 'auth'], function () {
        Route::get('to-do-list', 'ScheduleController@toDo');
        Route::get('profile/{username}', 'UserController@userProfile')->name('user.profile');
        Route::put('update', 'UserController@update')->name('user.update');

        Route::get('load-to-do-list', 'ScheduleController@getToDoList')->name('client.get-to-do-list');

        Route::post('create-task', 'ScheduleController@createTask')->name('client.create-task');

        Route::delete('delete-task/{id}', 'ScheduleController@deleteTask')->name('client.delete-task');

        Route::get('load-item-by-category', 'ScheduleController@getItemByCategory')->name('client.get-item-by-category');

        Route::get('single-task/{id}', 'ScheduleController@getSingleTask')->name('client.get-single-task');

        Route::post('choose-type-schedule', 'ScheduleController@chooseTypeSchedule')->name('client.choose-type-schedule');

        Route::put('update-task', 'ScheduleController@updateTask')->name('client.update-task');
    });
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'AdminController@index')->name('admin.index');

    Route::group(['namespace' => 'Admin'], function () {
        Route::get('user', 'UserController@index')->name('admin.user.index');
        Route::get('user-list', 'UserController@getList')->name('admin.user.list');
        Route::get('user-create', 'UserController@gcreate')->name('admin.user.create');
        Route::post('user-create', 'UserController@store')->name('admin.user.create');

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
