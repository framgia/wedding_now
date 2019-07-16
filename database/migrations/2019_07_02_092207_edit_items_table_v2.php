<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditItemsTableV2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn(['user_id', 'price']);
        });

        Schema::create('item_user', function ($table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('item_id');
            $table->unsignedInteger('price');
        });

        Schema::drop('category_item');

        Schema::drop('category_user');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function ($table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('price');
        });

        Schema::drop('item_user');

        Schema::create('category_item', function ($table) {
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('item_id');
        });

        Schema::create('category_user', function ($table) {
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('user_id');
        });
    }
}
