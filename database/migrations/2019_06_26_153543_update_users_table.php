<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('user_name')->nullable()->change();
            $table->string('phone')->nullable()->change();
            $table->date('birthday')->nullable()->change();
            $table->string('gender')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->string('user_name')->nullable(false)->change();
            $table->string('phone')->nullable(false)->change();
            $table->date('birthday')->nullable(false)->change();
            $table->string('gender')->nullable(false)->change();
        });
    }
}
