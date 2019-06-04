<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class UpdateCardsTableV2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cards', function($table) {
            $table->dropColumn('background_image');
            $table->string('present_img')->nullable();
        });

        Schema::table('card_metas', function($table) {
            $table->renameColumn('card_id', 'page_card_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cards', function($table) {
            $table->string('background_image')->nullable();
            $table->dropColumn('present_img');
        });

        Schema::table('card_metas', function($table) {
            $table->renameColumn('page_card_id', 'card_id');
        });
    }
}
