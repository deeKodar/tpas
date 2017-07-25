<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherAuditsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_audits', function (Blueprint $table) {
            $table->bigIncrements('audit_serial');
            $table->unsignedInteger('teachers_id');
            $table->char('employee_id',12)->unique();
            $table->date('date_of_birth');
            $table->string('position_level');
            $table->string('position_title');
            $table->integer('qualification_id');
            $table->integer('field_of_study_id');
            $table->char('school_id',13);
            $table->unsignedInteger('class_id');
            $table->unsignedInteger('core_subject_id');
            $table->integer('elective_subject_one_id');
            $table->integer('elective_subject_two_id');
            $table->integer('elective_subject_three_id');
            $table->integer('employee_status_type_id');
            $table->char('marital_status',1);
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
        Schema::dropIfExists('teacher_audits');
    }
}
