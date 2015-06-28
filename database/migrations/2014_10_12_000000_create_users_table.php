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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('study_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
        });

        Schema::create('location_regions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
        });

        Schema::create('location_municipalities', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
        });

        Schema::create('study_terms', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
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
        Schema::drop('study_fields');
        Schema::drop('location_municipalities');
        Schema::drop('location_regions');
        Schema::drop('study_terms');
    }
}
