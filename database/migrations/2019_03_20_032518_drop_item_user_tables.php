<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropItemUserTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('item_user');

        Schema::table('tasks', function($table) {
            $table->renameColumn('item_user_id', 'item_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('item_user', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('item_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('price');
            $table->timestamps();
        });

        Schema::table('tasks', function($table) {
            $table->renameColumn('item_id', 'item_user_id');
        });
    }
}
