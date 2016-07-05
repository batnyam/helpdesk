<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report', function(Blueprint $table){
            $table->increments('id');
            $table->integer('question')->unsigned()->nullable();
            $table->integer('answer')->unsigned()->nullable();
            $table->integer('tag')->unsigned()->nullable();
            $table->integer('comment')->unsigned()->nullable();
            $table->integer('created_user')->unsigned()->nullable();
            $table->integer('report_type')->unsigned()->nulllable();
            $table->text('body');
            $table->timestamps();
            $table->boolean('deleted');
        });

        Schema::table('report', function(Blueprint $table){
            $table->foreign('question')->references('id')->on('question');
            $table->foreign('answer')->references('id')->on('answer');
            $table->foreign('tag')->references('id')->on('tag');
            $table->foreign('comment')->references('id')->on('comment');
            $table->foreign('created_user')->references('id')->on('users');
            $table->foreign('report_type')->references('id')->on('report_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('report');
    }
}
