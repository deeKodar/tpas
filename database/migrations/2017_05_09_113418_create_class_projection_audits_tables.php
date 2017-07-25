<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassProjectionAuditsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_projection_audits', function (Blueprint $table) {
            $table->bigIncrements('audit_serial');
            $table->integer('class_projection_id');
            $table->integer('school_id');
            $table->integer('class_id');
            $table->integer('student_count');
            $table->integer('section_count');
            $table->string('curriculum_year');
            $table->integer('projection_type_id');
            $table->integer('user_id');
            $table->timestamps();
            $table->char('cmd_flag',1);
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
        Schema::dropIfExists('class_projection_audits');
    }
}
