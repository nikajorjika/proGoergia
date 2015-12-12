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
        Schema::create('listenernumbers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number');

        });

        Schema::create('ratingsystems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('system');

        });

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
            $table->integer('listenernumber_id')->unsigned();
            $table->foreign('listenernumber_id')->references('id')->on('listenernumbers');
            $table->string('credit');
            $table->string('contact_hours');
            $table->string('free_hours');
            $table->string('edu_program_results');
            $table->text('program_short_desc');
            $table->string('learn_methods_other');
            $table->string('estimations_other');
            $table->text('certificate_rules_other');
            $table->integer('ratingsystem_id')->unsigned();
            $table->foreign('ratingsystem_id')->references('id')->on('ratingsystems');
            $table->string('rating_system_other');
            $table->text('edu_program_human_resource');
            $table->text('trainers_contracts');
            $table->text('edu_program_learn_env');
            $table->text('edu_program_learn_resources');
            $table->text('learn_materials_other');
            $table->integer('user_id')-> unsigned();
            $table->foreign('user_id')->references('id')->on('users')->default(99);
        });



        DB::table('listenernumbers')->insert(
            array(
                array(
                    'number' => '1',
                ),
                array(
                    'number' => '1-5'
                ),
                array(
                    'number' => '5-10'
                ),
                array(
                    'number' => '10-15'
                ),
                array(
                    'number' => '15-20'
                ),
                array(
                    'number' => '20-30'
                )
            )
        );
        Schema::create('learnmethods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('method');
        });

        DB::table('learnmethods')->insert(
            array(
                array(
                    'method' => 'ლექცია',
                ),
                array(
                    'method' => 'დისკუსია'
                ),
                array(
                    'method' => 'პრობლემაზე ორიენტირებული სწავლება'
                ),
                array(
                    'method' => 'დემონსტრირებით სწავლება'
                ),
                array(
                    'method' => 'პრეზენტაცია'
                ),
                array(
                    'method' => 'კონსულტირება'
                ),
                array(
                    'method' => 'პრაქტიკული სავარჯიშო'
                ),
                array(
                    'method' => 'გონებრივი იერიში'
                ),
                array(
                    'method' => 'შემთხვევის ანალიზი'
                ),
                array(
                    'method' => 'როლური თამაშები'
                ),
                array(
                    'method' => 'ტექსტზე მუშაობა'
                ),
                array(
                    'method' => 'კითხვა-პასუხი'
                ),
                array(
                    'method' => 'ამბავი'
                ),
                array(
                    'method' => 'ჯგუფური მუშაობა'
                ),
                array(
                    'method' => 'წყვილში მუშაობა'
                ),
                array(
                    'method' => 'ინდივიდუალური დავალება'
                ),
            )
        );

        Schema::create('decleration_learnmethod', function (Blueprint $table) {
            $table->integer('decleration_id')->unsigned();
            $table->foreign('decleration_id')->references('id')->on('declerations');
            $table->integer('learnmethod_id')->unsigned();
            $table->foreign('learnmethod_id')->references('id')->on('learnmethods');
        });

        Schema::create('estimations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        DB::table('estimations')->insert(
            array(
                array(
                    'name' => 'ტესტი',
                ),
                array(
                    'name' => 'წერითი ნამუშევარი'
                ),
                array(
                    'name' => 'პრეზენტაცია'
                ),
                array(
                    'name' => 'დისკუსია'
                ),
                array(
                    'name' => 'ესე'
                ),
                array(
                    'name' => 'პროექტი'
                ),
                array(
                    'name' => 'პრაქტიკული სავარჯიშო'
                ),
                array(
                    'name' => 'ზეპირი გამოკითხვა'
                ),
                array(
                    'name' => 'შემთხვევის ანალიზი'
                ),
            )
        );

        Schema::create('declereration_estimation', function (Blueprint $table) {
            $table->integer('decleration_id')->unsigned();
            $table->foreign('decleration_id')->references('id')->on('declerations');
            $table->integer('estimation_id')->unsigned();
            $table->foreign('estimation_id')->references('id')->on('estimations');
            $table->string('min');
            $table->string('max');
        });

        Schema::create('certificaterules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        DB::table('certificaterules')->insert(
            array(
                array(
                    'name' => 'დასწრება (საკონტაქტო საათები)',
                ),
                array(
                    'name' => 'საბოლოო შეფასება  (მაქსიმალური შეფასება)'
                ),
            )
        );

        Schema::create('declereration_certificaterule', function (Blueprint $table) {
            $table->integer('decleration_id')->unsigned();
            $table->foreign('decleration_id')->references('id')->on('declerations');
            $table->integer('certificaterule_id')->unsigned();
            $table->foreign('certificaterule_id')->references('id')->on('certificaterules');
            $table->string('percentage');
        });


        DB::table('ratingsystems')->insert(
            array(
                array(
                    'system' => 'მონაწილის მიერ კითხვარის შევსება და მისი ანალიზი',
                ),
                array(
                    'system' => 'ინტერვიუ მონაწილესთან/ მონაწილეებთან და მისი ანალიზი'
                ),
                array(
                    'system' => 'ტრენერის თვითშეფასება/რეპორტი'
                ),
            )
        );

        Schema::create('learnmaterials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('material');
        });

        DB::table('learnmaterials')->insert(
            array(
                array(
                    'material' => 'მაგიდები, სკამები',
                ),
                array(
                    'material' => 'კომპიუტერი'
                ),
                array(
                    'material' => 'ინტერნეტი/ინტერნეტრესურსები'
                ),
                array(
                    'material' => 'პროექტორი, პროექტორის ეკრანი'
                ),
                array(
                    'material' => 'საკანცელარიო მასალა (რვეული,  ბლოკნოტი, კალამი)'
                ),
                array(
                    'material' => 'ფლიპჩარტის დაფა, მარკერები'
                ),
                array(
                    'material' => 'ფლიპჩარტის ქაღალდი'
                ),
                array(
                    'material' => 'სმარტ-ბორდი'
                ),
                array(
                    'material' => 'პერსონალური კომპიუტერები მონაწილეებისათვის'
                ),
                array(
                    'material' => 'ვიდეოკამერა'
                ),
                array(
                    'material' => 'საწერი დაფა, ცარცი'
                ),
                array(
                    'material' => 'ფურცლები, ფერადი ფურცლები'
                ),
                array(
                    'material' => 'ფლომასტერები'
                ),
            )
        );

        Schema::create('decleration_learnmaterial', function (Blueprint $table) {
            $table->integer('decleration_id')->unsigned();
            $table->foreign('decleration_id')->references('id')->on('declerations');
            $table->integer('learnmaterial_id')->unsigned();
            $table->foreign('learnmaterial_id')->references('id')->on('learnmaterials');
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
        Schema::drop('listenernumbers');
        Schema::drop('learnmethods');
        Schema::drop('decleration_learnmethod');
        Schema::drop('declereration_estimation');
        Schema::drop('certificaterules');
        Schema::drop('declereration_certificaterule');
        Schema::drop('ratingsystems');
        Schema::drop('learnmaterials');
        Schema::drop('decleration_learnmaterial');
    }
}
