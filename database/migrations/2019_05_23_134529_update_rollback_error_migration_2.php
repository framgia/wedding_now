<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateRollbackErrorMigration2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('item_user');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function($table) {
            $table->dropColumn(['topic_id', 'brief', 'status']);
        });

        Schema::table('users', function($table) {
            $table->unsignedInteger('topic_id');
            $table->string('brief');
            $table->integer('status');
        });

        Schema::table('tasks', function (Blueprint $table) {
            if (!Schema::hasColumn('tasks', 'percent')) {
                $table->integer('percent')->nullable();
            }
        });
    }
}
