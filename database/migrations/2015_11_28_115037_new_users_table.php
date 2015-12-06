<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NewUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('users');
        Schema::create('users', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('role')->default(100);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('personal_id')->unique();
            $table->string('email')->unique();
            $table->string('telephone')->unique();
            $table->string('password',60);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {

        });
    }
}
