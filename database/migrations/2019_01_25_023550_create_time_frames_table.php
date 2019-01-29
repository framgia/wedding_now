<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeFramesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_frames', function (Blueprint $table) {
            $table->increments('id');
            $table->string('time_frame');
            $table->string('value');
            $table->timestamps();
        });

        Schema::table('tasks', function (Blueprint $table) {
            $table->unsignedInteger('time_frame_id');
            $table->date('time_occurs')->nullable()->change();
            $table->string('note')->nullable()->change();
            $table->unsignedInteger('schedule_wedding_id');
        });

        Schema::table('schedule_weddings', function (Blueprint $table) {
            $table->date('marriage_day')->nullable()->change();
            $table->string('note')->nullable()->change();
            $table->unsignedInteger('schedule_wedding_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time_frames');

        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('time_frame_id');
            $table->date('time_occurs')->nullable(false)->change();
            $table->string('note')->nullable(false)->change();
            $table->dropColumn('schedule_wedding_id');
        });

        Schema::table('schedule_weddings', function (Blueprint $table) {
            $table->date('marriage_day')->nullable(false)->change();
            $table->string('note')->nullable(false)->change();
            $table->unsignedInteger('schedule_wedding_id')->nullable(false)->change();
        });
    }
}
