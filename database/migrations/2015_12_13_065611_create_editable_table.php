<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEditableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('decleration_id')->unsigned();
            $table->foreign('decleration_id')->references('id')->on('declerations')->onDelete('cascade');
            $table->string('field_name');
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
        Schema::drop('editables');
    }
}
