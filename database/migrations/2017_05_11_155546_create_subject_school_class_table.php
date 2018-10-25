<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectSchoolClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         //Schema::create('subject_school_class', function (Blueprint $table) {
         Schema::create('school_class_subject', function (Blueprint $table) {
            //$table->increments('id');

            $table->integer('school_class_id')->unsigned();
            $table->integer('subject_id')->unsigned();

            //$table->primary(['subject_id', 'school_class_id']);
            $table->primary(['school_class_id', 'subject_id']);
            $table->timestamps();

//            $table->foreign('subject_id')->references('id')
//                 ->on('subjects')->onDelete('cascade');
//
//            $table->foreign('school_class_id')->references('id')
//                ->on('school_classes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('school_class_subject');
    }
}
