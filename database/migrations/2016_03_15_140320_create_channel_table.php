<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChannelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channel', function(Blueprint $table){
            $table->increments('id');
            $table->string('name', 30)->unique();
            $table->text('description');
            $table->timestamps();
            $table->boolean('published');
            $table->integer('created_user')->unsigned()->nullable();
            $table->integer('updated_user')->unsigned()->nullable();
        });

        Schema::table('channel', function(Blueprint $table){
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
        Schema::drop('channel');
    }
}
