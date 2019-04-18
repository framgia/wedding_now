<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cards', function($table) {
            $table->unsignedInteger('schedule_wedding_id')->nullable()->change();
            $table->string('type')->default('custom');
            $table->unsignedInteger('card_id')->nullable();
            $table->renameColumn('text_box_name', 'name');
            $table->dropColumn(['style', 'content']);
            $table->string('background_image')->nullable();
            $table->string('orientation')->nullable();
            $table->unsignedInteger('number_pages')->nullable();
        });

        Schema::table('card_metas', function($table) {
            $table->dropColumn('value');
            $table->string('div_style')->nullable();
            $table->string('content')->nullable();
            $table->string('key')->nullable()->change();
            $table->string('textarea_style')->nullable();
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
            $table->unsignedInteger('schedule_wedding_id')->nullable(false)->change();
            $table->dropColumn(['type', 'card_id', 'background_image', 'number_pages', 'orientation']);
            $table->renameColumn('name', 'text_box_name');
            $table->string('style')->nullable();
            $table->string('content');
        });

        Schema::table('card_metas', function($table) {
            $table->dropColumn(['div_style', 'textarea_style', 'content']);
            $table->string('value');
            $table->string('key')->nullable(false)->change();
        });
    }
}
