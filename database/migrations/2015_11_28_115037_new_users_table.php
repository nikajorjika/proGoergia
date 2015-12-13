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
                    'first_name'  => 'admin1',
                    'last_name'   => 'admin1',
                    'personal_id' => 'personal_id1',
                    'email'       => 'admin1@gmail.com',
                    'telephone'   => 'number1',
                    'role'        => 1,
                    'password'    => bcrypt('WGxDu88mLx23'),
                ),
                array(
                    'first_name'  => 'admin2',
                    'last_name'   => 'admin2',
                    'personal_id' => 'personal_id2',
                    'email'       => 'admin2@gmail.com',
                    'telephone'   => 'number2',
                    'role'        => 2,
                    'password'    => bcrypt('KDxeP11cVx47'),
                ),
                array(
                    'first_name'  => 'admin3',
                    'last_name'   => 'admin3',
                    'personal_id' => 'personal_id3',
                    'email'       => 'admin3@gmail.com',
                    'telephone'   => 'number3',
                    'role'        => 3,
                    'password'    => bcrypt('Lob23pUh7Vdc'),
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
