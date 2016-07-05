<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer', function(Blueprint $table){
            $table->increments('id');
            $table->text('body');
            $table->integer('question')->unsigned()->nullable();
            $table->integer('created_user')->unsigned()->nullable();
            $table->integer('favouriteCount');
            $table->timestamps();
            $table->boolean('deleted');
        });

        Schema::table('answer', function(Blueprint $table){
            $table->foreign('question')->references('id')->on('question');
            $table->foreign('created_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('answer');
    }
}
