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
        Route::get('to-do-list', 'UserController@toDo');
        Route::get('profile/{username}', 'UserController@userProfile')->name('user.profile');
        Route::put('update', 'UserController@update')->name('user.update');
    });
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'AdminController@index')->name('admin.index');

    Route::group(['namespace' => 'Admin'], function () {
        Route::get('user', 'UserController@index')->name('admin.user.index');
        Route::get('user-list', 'UserController@getList')->name('admin.user.list');
        Route::get('user-create', 'UserController@gcreate')->name('admin.user.create');
        Route::post('user-create', 'UserController@store')->name('admin.user.create');
    });

    Route::get('list-schedule-default', 'Admin\ScheduleController@index')->name('admin.list-schedule-default');

    Route::get('list-schedule-default', 'Admin\ScheduleWeddingController@index')->name('admin.list-schedule-default');

    Route::get('create-schedule-default', 'Admin\ScheduleWeddingController@create')->name('admin.create-schedule-default');

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
