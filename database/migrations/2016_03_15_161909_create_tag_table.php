<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag', function(Blueprint $table){
            $table->increments('id');
            $table->string('name', 30);
            $table->integer('question')->unsigned()->nullable();
            $table->integer('count');
            $table->integer('searchCount');
            $table->integer('created_user')->unsigned()->nullable();
            $table->integer('updated_user')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('tag', function(Blueprint $table){
            $table->foreign('question')->references('id')->on('question');
            $table->foreign('created_user')->references('id')->on('users');
            $table->foreign('updated_user')->references('id')->on('users');
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
