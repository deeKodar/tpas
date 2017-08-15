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
            $table->integer('school_class_id')->unsigned();
            $table->integer('subject_id')->unsigned();
            $table->string('standard_hour')->default('0');
            $table->string('standard_minute')->default('0');
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
        Schema::dropIfExists('standard_subject_hours');
    }
}
