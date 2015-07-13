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

        Schema::create('trainings', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('description');
            $table->string('file');
            $table->string('link');
            $table->timestamps();
        });

        Schema::create('fields', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->text('name');
            $table->timestamps();
        });
        Schema::create('field_training', function (Blueprint $table) {
            $table->integer('training_id')->unsigned();
            $table->foreign('training_id')->references('id')->on('trainings')->onDelete('cascade');
            $table->integer('field_id')->unsigned();
            $table->foreign('field_id')->references('id')->on('fields');
            $table->timestamps();
        });

        Schema::create('regions', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->text('name');
            $table->timestamps();
        });

        Schema::create('municipalities', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('region_id')->unsigned();
            $table->foreign('region_id')->references('id')->on('regions');
            $table->text('name');
            $table->timestamps();
        });

        Schema::create('municipality_training', function (Blueprint $table) {
            $table->integer('training_id')->unsigned()->index();
            $table->foreign('training_id')->references('id')->on('trainings')->onDelete('cascade');
            $table->integer('municipality_id')->unsigned()->index();
            $table->foreign('municipality_id')->references('id')->on('municipalities');
            $table->text('name');
            $table->timestamps();
        });

        Schema::create('terms', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->text('name');
            $table->timestamps();
        });

        Schema::create('term_training', function (Blueprint $table) {
            $table->integer('training_id')->unsigned()->index();
            $table->foreign('training_id')->references('id')->on('trainings')->onDelete('cascade');
            $table->integer('term_id')->unsigned()->index();
            $table->foreign('term_id')->references('id')->on('terms');
            $table->text('name');
            $table->timestamps();
        });
        Schema::create('months', function(Blueprint $table){
            $table->increments('id')->unsigned();
            $table->text('name');
            $table->timestamps();
        });

        Schema::create('quarters', function(Blueprint $table){
            $table->increments('id')->unsigned();
            $table->text('name');
            $table->timestamps();
        });
        Schema::create('month_training', function(Blueprint $table){
            $table->integer('month_id')->unsigned()->index();
            $table->foreign('month_id')->references('id')->on('months')->onDelete('cascade');
            $table->integer('training_id')->unsigned()->index();
            $table->foreign('training_id')->references('id')->on('trainings')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('quarter_training', function(Blueprint $table){
            $table->integer('quarter_id')->unsigned()->index();
            $table->foreign('quarter_id')->references('id')->on('quarters')->onDelete('cascade');
            $table->integer('training_id')->unsigned()->index();
            $table->foreign('training_id')->references('id')->on('trainings')->onDelete('cascade');
            $table->timestamps();
        });
        DB::table('months')->insert(
            array(
                array(
                    'name' => 'იანვარი'
                ),
                array(
                    'name' => 'თებერვალი'
                ),
                array(
                    'name' => 'მარტი'
                ),
                array(
                    'name' => 'აპრილი'
                ),
                array(
                    'name' => 'მაისი'
                ),
                array(
                    'name' => 'ივნისი'
                ),
                array(
                    'name' => 'ივლისი'
                ),
                array(
                    'name' => 'აგვისტო'
                ),
                array(
                    'name' => 'სექტემბერი'
                ),
                array(
                    'name' => 'ოქტომბერი'
                ),
                array(
                    'name' => 'ნოემბერი'
                ),
                array(
                    'name' => 'დეკემბერი'
                )

            )
        );
        DB::table('quarters')->insert(
            array(
                array(
                    'name' => 'I კვარტალი'
                ),
                array(
                    'name' => 'II კვარტალი'
                ),
                array(
                    'name' => 'III კვარტალი'
                ),
                array(
                    'name' => 'IV კვარტალი'
                )
            )
        );
        DB::table('fields')->insert(
            array(
                array(
                    'name' => 'Excel'
                ),
                array(
                    'name' => 'უცხო ენები'
                ),
                array(
                    'name' => 'მათემატიკა'
                ),
                array(
                    'name' => 'ბიოლოგია'
                )
            )
        );
        DB::table('terms')->insert(
            array(
                array(
                    'name' => 'მოკლევადიანი'
                ),
                array(
                    'name' => 'გრძელვადიანი'
                ),
                array(
                    'name' => 'დისტანციური'
                ),
                array(
                    'name' => 'ზურა'
                )
            )
        );
        DB::table('regions')->insert(
            array(
                array(
                    'name' => 'თბილისი'
                ),
                array(
                    'name' => 'ბათუმი'
                ),
                array(
                    'name' => 'ქუთაისი'
                ),
                array(
                    'name' => 'ზუგდიდი'
                )
            )
        );
        DB::table('municipalities')->insert(
            array(
                array(
                    'name' => 'საბურთალო',
                    'region_id' => '1'
                ),
                array(
                    'name' => 'ვაკე',
                    'region_id' => '1'
                ),
                array(
                    'name' => 'თემქა',
                    'region_id' => '1'
                ),
                array(
                    'name' => 'სენაკი',
                    'region_id' => '4'
                ),
                array(
                    'name' => 'გალი',
                    'region_id' => '4'
                ),
                array(
                    'name' => 'სარფი',
                    'region_id' => '2'
                ),
                array(
                    'name' => 'წყალტუბო',
                    'region_id' => '3'
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
        Schema::drop('users');
        Schema::drop('fields');
        Schema::drop('municipalities');
        Schema::drop('regions');
        Schema::drop('municipality_training');
        Schema::drop('field_training');
        Schema::drop('term_training');
        Schema::drop('trainings');
    }
}
