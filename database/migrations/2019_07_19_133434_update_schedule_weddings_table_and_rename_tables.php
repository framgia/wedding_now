<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateScheduleWeddingsTableAndRenameTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schedule_weddings', function (Blueprint $table) {
            $table->boolean('default')->nullable()->default(false);
            $table->renameColumn('schedule_wedding_id', 'schedule_id');
        });

        Schema::table('schedule_metas', function (Blueprint $table) {
            $table->renameColumn('schedule_wedding_id', 'schedule_id');
        });

        Schema::table('tasks', function (Blueprint $table) {
            $table->renameColumn('schedule_wedding_id', 'schedule_id');
        });

        Schema::table('cards', function (Blueprint $table) {
            $table->renameColumn('schedule_wedding_id', 'schedule_id');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->renameColumn('schedule_wedding_id', 'schedule_id');
        });

        Schema::rename('schedule_weddings', 'schedules');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schedule_weddings', function ($table) {
            $table->dropColumn('default');
            $table->renameColumn('schedule_id', 'schedule_wedding_id');
        });

        Schema::table('schedule_metas', function (Blueprint $table) {
            $table->renameColumn('schedule_id', 'schedule_wedding_id');
        });

        Schema::table('tasks', function (Blueprint $table) {
            $table->renameColumn('schedule_id', 'schedule_wedding_id');
        });

        Schema::table('cards', function (Blueprint $table) {
            $table->renameColumn('schedule_id', 'schedule_wedding_id');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->renameColumn('schedule_id', 'schedule_wedding_id');
        });

        Schema::rename('schedules', 'schedule_weddings');
    }
}
