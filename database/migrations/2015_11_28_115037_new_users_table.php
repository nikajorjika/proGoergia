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
            $table->rememberToken();
            $table->string('password',60);
        });

        DB::table('users')->insert(
            array(
                array(
                    'name'     => 'admin1',
                    'role'     => 1,
                    'password' => bcrypt('WGxDu88mLx23'),
                ),
                array(
                    'name'     => 'admin2',
                    'role'     => 2,
                    'password' => bcrypt('KDxeP11cVx47'),
                ),
                array(
                    'name'     => 'admin3',
                    'role'     => 3,
                    'password' => bcrypt('Lob23pUh7Vdc'),
                ),
            )
        );
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
