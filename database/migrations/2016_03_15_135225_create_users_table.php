<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('username', 30)->unique();
            $table->string('password', 255);
            $table->string('email')->unique();
            $table->binary('image');
            $table->text('info');
            $table->rememberToken();
            $table->timestamps();
            $table->integer('role')->unsigned()->nullable();
            $table->integer('rank')->unsigned()->nullable();
        });

        Schema::table('users', function (Blueprint $table){
            $table->foreign('role')->references('id')->on('role');
            $table->foreign('rank')->references('id')->on('rank');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
