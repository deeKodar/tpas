<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassProjectionTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_projections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id');
            $table->integer('dzongkhag_id');
            $table->integer('school_class_id');
            $table->integer('student_count');
            $table->integer('section_count');
            $table->string('curriculum_year');
            $table->integer('projection_type_id');
            $table->integer('user_id');
            $table->timestamps();
            $table->integer('version');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_projections');
    }
}
