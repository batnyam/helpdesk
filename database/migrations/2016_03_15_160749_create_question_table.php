<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question', function(Blueprint $table){
            $table->increments('id');
            $table->string('title', 155);
            $table->text('body');
            $table->integer('minRank');
            $table->integer('maxRank');
            $table->integer('created_user')->unsigned()->nullable();
            $table->integer('channel')->unsigned()->nullable();
            $table->integer('answerCount');
            $table->integer('commentCount');
            $table->integer('favouriteCount');
            $table->integer('viewCount');
            $table->boolean('published');
            $table->timestamps();
            $table->boolean('deleted');
        });

        Schema::table('question', function(Blueprint $table){
            $table->foreign('created_user')->references('id')->on('users');
            $table->foreign('channel')->references('id')->on('channel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('question');
    }
}
