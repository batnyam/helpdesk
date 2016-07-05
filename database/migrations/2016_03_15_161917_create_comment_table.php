<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment', function(Blueprint $table){
            $table->increments('id');
            $table->text('body');
            $table->integer('question')->unsigned()->nullable();
            $table->integer('answer')->unsigned()->nullable();
            $table->integer('created_user')->unsigned()->nullable();
            $table->integer('score');
            $table->timestamps();
            $table->boolean('deleted');
        });

        Schema::table('comment', function(Blueprint $table){
            $table->foreign('question')->references('id')->on('question');
            $table->foreign('answer')->references('id')->on('answer');
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
        Schema::drop('comment');
    }
}
