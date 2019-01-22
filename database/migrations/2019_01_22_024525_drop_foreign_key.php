<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post_tag', function (Blueprint $table) {
            $table->dropForeign('new_tag_new_id_foreign');
            $table->dropForeign('new_tag_tag_id_foreign');
        });

        Schema::table('category_item', function (Blueprint $table) {
            $table->dropForeign('category_item_category_id_foreign');
            $table->dropForeign('category_item_item_id_foreign');
        });

        Schema::table('districts', function (Blueprint $table) {
            $table->dropForeign('counties_city_id_foreign');
        });

        Schema::table('schedule_weddings', function (Blueprint $table) {
            $table->dropForeign('schedule_weddings_user_id_foreign');
            $table->dropForeign('schedule_weddings_schedule_wedding_id_foreign');
        });

        Schema::table('role_user', function (Blueprint $table) {
            $table->dropForeign('role_user_user_id_foreign');
            $table->dropForeign('role_user_role_id_foreign');
        });

        Schema::table('permission_role', function (Blueprint $table) {
            $table->dropForeign('permission_role_permission_id_foreign');
            $table->dropForeign('permission_role_role_id_foreign');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign('news_schedule_wedding_id_foreign');
            $table->dropForeign('news_user_id_foreign');
        });

        Schema::table('notifications', function (Blueprint $table) {
            $table->dropForeign('notifications_user_id_foreign');
            $table->dropForeign('notifications_receiver_id_foreign');
        });

        Schema::table('item_user', function (Blueprint $table) {
            $table->dropForeign('item_user_item_id_foreign');
            $table->dropForeign('item_user_user_id_foreign');
        });

        Schema::table('category_user', function (Blueprint $table) {
            $table->dropForeign('category_user_category_id_foreign');
            $table->dropForeign('category_user_user_id_foreign');
        });

        Schema::table('locations', function (Blueprint $table) {
            $table->dropForeign('locations_district_id_foreign');
        });

        Schema::table('schedule_metas', function (Blueprint $table) {
            $table->dropForeign('schedule_metas_schedule_wedding_id_foreign');
        });

        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign('tasks_category_id_foreign');
            $table->dropForeign('tasks_item_user_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category_item', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('item_id')->references('id')->on('items');
        });

        Schema::table('districts', function (Blueprint $table) {
            $table->rename('counties');
        });

        Schema::table('counties', function (Blueprint $table) {
            $table->foreign('city_id')->references('id')->on('cities');
        });

        Schema::table('schedule_weddings', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('schedule_wedding_id')->references('id')->on('schedule_weddings');
        });

        Schema::table('role_user', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('permission_role', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('permission_id')->references('id')->on('permissions');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->rename('news');
        });

        Schema::table('news', function (Blueprint $table) {
            $table->foreign('schedule_wedding_id')->references('id')->on('schedule_weddings');
        });

        Schema::table('post_tag', function (Blueprint $table) {
            $table->renameColumn('post_id', 'new_id');
            $table->rename('new_tag');
        });

        Schema::table('new_tag', function (Blueprint $table) {
            $table->foreign('new_id')->references('id')->on('news');
            $table->foreign('tag_id')->references('id')->on('tags');
        });

        Schema::table('notifications', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('receiver_id')->references('id')->on('users');
        });

        Schema::table('item_user', function (Blueprint $table) {
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('category_user', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('schedule_metas', function (Blueprint $table) {
            $table->foreign('schedule_wedding_id')->references('id')->on('schedule_weddings');
        });

        Schema::table('tasks', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('item_user_id')->references('id')->on('item_user');
        });
    }
}
