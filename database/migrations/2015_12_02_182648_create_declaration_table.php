<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeclarationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('declerations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('applicant');
            $table->string('law_form');
            $table->string('identification_number');
            $table->string('address');
            $table->string('contact_person');
            $table->string('email');
            $table->string('contact_telephone');
            $table->integer('field_id')->unsigned();
            $table->foreign('field_id')->references('id')->on('fields');
            $table->text('comment');
            $table->string('edu_program_name');
            $table->text('edu_program_goal');
            $table->text('edu_program_prelet');
            $table->string('edu_program_goal_groups');
            $table->string('edu_program_listeners_number');
            $table->string('edu_programm_cube');
            $table->string('edu_program_results');
            $table->text('program_short_desc');
            $table->text('edu_program_learn_methods');
            $table->text('edu_program_participants_ratings');
            $table->text('certificate_award_rules');
            $table->text('edu_program_rating_system');
            $table->text('edu_program_human_resource');
            $table->text('trainers_contracts');
            $table->text('edu_program_learn_env');
            $table->text('edu_program_learn_resources');
            $table->text('edu_program_learn_materials');
            $table->integer('user_id')-> unsigned();
            $table->foreign('user_id')->references('id')->on('users')->default(99);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('declerations');
    }
}
