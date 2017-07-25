<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherProjectionLogsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_projection_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id');
            $table->integer('subject_id');
            $table->integer('teacher_count');
            $table->string('curricuum_year');
            $table->timestamps();
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacher_projection_logs');
    }
}
