 <?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateItemTaskTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('item_user_task', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('item_user_id');
                $table->unsignedInteger('task_id');
                $table->unsignedInteger('price');
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('item_task');
        }
    }
