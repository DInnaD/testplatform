<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('role_id', false, 10);
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('email')->unique();
            $table->boolean('verified')->default(false);
            $table->string('social_id')->nullable();
            $table->enum('social',['Google','Facebook'])->nullable();
            $table->string('password')->nullable();
            $table->boolean('popup')->nullable();
            $table->integer('parent_phone')->nullable();
            $table->enum('role',['admin','main_creator','creator','user'])->nullable();
            $table->rememberToken();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
