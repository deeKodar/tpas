<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id');
            $table->integer('subject_id');
            $table->integer('dzongkhag_id');
            $table->integer('actual_teachers');
            $table->integer('required_teachers');
            $table->integer('teacher_gap');
            $table->string('curriculum_year');
            $table->integer('projection_type_id');
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
        Schema::dropIfExists('projections');
    }
}
