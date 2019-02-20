<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class EntrustSetupTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        // Create table for storing roles
        Schema::table('roles', function (Blueprint $table) {
            $table->string('name')->unique()->change();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
        });

        // Create table for associating roles to users (Many-to-Many)
        Schema::dropIfExists('role_user');
        Schema::create('role_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['user_id', 'role_id']);
        });

        // Create table for storing permissions
        Schema::table('permissions', function (Blueprint $table) {
            $table->dropColumn('slug');

            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable()->change();
        });

        // Create table for associating permissions to roles (Many-to-Many)
        Schema::table('permission_role', function (Blueprint $table) {
            $table->integer('permission_id')->unsigned()->change();
            $table->integer('role_id')->unsigned()->change();

            $table->foreign('permission_id')->references('id')->on('permissions')
                ->onUpdate('cascade')->onDelete('cascade')->change();
            $table->foreign('role_id')->references('id')->on('roles')
                ->onUpdate('cascade')->onDelete('cascade')->change();

            $table->dropColumn('id');
            $table->primary(['permission_id', 'role_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('permission_role');
        Schema::drop('permissions');
        Schema::drop('role_user');
        Schema::drop('roles');
    }
}
