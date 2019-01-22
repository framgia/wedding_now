<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('gender')->change();
            $table->dropColumn(['first_name', 'last_name', 'introduction']);
            $table->string('name');
            $table->string('user_name');
        });

        Schema::table('news', function (Blueprint $table) {
            $table->string('slug');
            $table->rename('posts');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->string('slug');
        });

        Schema::table('items', function (Blueprint $table) {
            $table->string('slug');
        });

        Schema::table('schedule_weddings', function (Blueprint $table) {
            $table->string('slug');
            $table->renameColumn('marring_day', 'marriage_day');
        });

        Schema::table('cities', function (Blueprint $table) {
            $table->string('slug');
        });

        Schema::table('tasks', function (Blueprint $table) {
            $table->string('note');
        });

        Schema::table('new_tag', function (Blueprint $table) {
            $table->renameColumn('new_id', 'post_id');
            $table->rename('post_tag');
        });

        Schema::table('counties', function (Blueprint $table) {
            $table->rename('districts');
        });

        Schema::table('locations', function (Blueprint $table) {
            $table->unsignedInteger('district_id');
            $table->foreign('district_id')->references('id')->on('districts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('gender')->change();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('introduction');
            $table->dropColumn(['name', 'user_name']);
        });

        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn('slug');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('slug');
        });

        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn('slug');
        });

        Schema::table('schedule_weddings', function (Blueprint $table) {
            $table->dropColumn('slug');
            $table->renameColumn('marriage_day', 'marring_day');
        });

        Schema::table('cities', function (Blueprint $table) {
            $table->dropColumn('slug');
        });

        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('note');
        });

        Schema::table('locations', function (Blueprint $table) {
            $table->dropColumn('district_id');
        });
    }
}
