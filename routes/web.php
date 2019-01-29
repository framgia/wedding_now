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

Route::get('/', function () {
    return view('index');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin-login', 'AdminController@getAdminLogin')->name('admin.login');
Route::post('admin-login', 'AdminController@postAdminLogin')->name('admin.login');

Route::group(['namespace' => 'User'], function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::get('to-do-list', 'UserController@toDo');
        Route::get('my-profile', 'UserController@myProfile');
    });
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::get('profile', 'AdminController@profile')->name('admin.profile');
    Route::put('update', 'AdminController@update')->name('admin.update');
    Route::get('list-schedule-default', 'Admin\ScheduleController@index')->name('admin.list-schedule-default');

    Route::get('list-schedule-default', 'Admin\ScheduleWeddingController@index')->name('admin.list-schedule-default');

    Route::get('create-schedule-default', 'Admin\ScheduleWeddingController@create')->name('admin.create-schedule-default');

    Route::get('edit-schedule-default/{id}-{slug}', 'Admin\ScheduleWeddingController@edit')->name('admin.edit-schedule-default');

    Route::post('store-schedule-default', 'Admin\ScheduleWeddingController@store')->name('admin.store-schedule-default');

    Route::put('update-schedule-default/{id}', 'Admin\ScheduleWeddingController@update')->name('admin.update-schedule-default');

    Route::delete('delete-schedule-default/{id}', 'Admin\ScheduleWeddingController@destroy')->name('admin.delete-schedule-default');

    Route::get('task-in-schedule', 'Admin\ScheduleWeddingController@getTasks')->name('admin.task-in-schedule');

    Route::get('categories-pluck', 'Admin\ScheduleWeddingController@getCategoryPluck')->name('admin.categories-pluck');

    Route::get('item-with-vendor-pluck-by-category', 'Admin\ScheduleWeddingController@getItemWithVendorPluckByIdCategory')->name('admin.item-with-vendor-pluck-by-category');

    Route::get('time-frame-pluck', 'Admin\ScheduleWeddingController@getTimeFramePluck')->name('admin.time-frame-pluck');
});
