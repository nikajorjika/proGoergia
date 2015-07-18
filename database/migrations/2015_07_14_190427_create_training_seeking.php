<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingSeeking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seek_trainings', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('description');
            $table->string('file');
            $table->string('link');
            $table->string('contact');
            $table->string('quantity');
            $table->timestamps();
        });
        Schema::create('field_seek_training', function (Blueprint $table) {
            $table->integer('seek_training_id')->unsigned();
            $table->foreign('seek_training_id')->references('id')->on('seek_trainings')->onDelete('cascade');
            $table->integer('field_id')->unsigned();
            $table->foreign('field_id')->references('id')->on('fields');
            $table->timestamps();
        });
        Schema::create('municipality_seek_training', function (Blueprint $table) {
            $table->integer('seek_training_id')->unsigned()->index();
            $table->foreign('seek_training_id')->references('id')->on('seek_trainings')->onDelete('cascade');
            $table->integer('municipality_id')->unsigned()->index();
            $table->foreign('municipality_id')->references('id')->on('municipalities');
            $table->text('name');
            $table->timestamps();
        });
        Schema::create('seek_training_term', function (Blueprint $table) {
            $table->integer('seek_training_id')->unsigned()->index();
            $table->foreign('seek_training_id')->references('id')->on('seek_trainings')->onDelete('cascade');
            $table->integer('term_id')->unsigned()->index();
            $table->foreign('term_id')->references('id')->on('terms');
            $table->text('name');
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
        Schema::drop('seek_trainings');
    }
}
