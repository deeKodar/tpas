<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStandardSubjectHoursTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standard_subject_hours', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subject_school_class_id')->unsigned();
            $table->string('standard_hour');
            $table->string('standard_minute');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('standard_subject_hours');
    }
}
