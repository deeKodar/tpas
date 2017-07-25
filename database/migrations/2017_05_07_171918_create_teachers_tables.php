<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->char('employee_id',12)->unique();
            $table->char('citizenship_id',11)->unique();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('citizenship');
            $table->enum('gender',['M','F']);
            $table->date('date_of_birth');
            $table->string('position_level');
            $table->string('position_title');
            $table->unsignedInteger('employment_type_id');
            $table->date('initial_appointment_date');
            $table->date('current_appointment_date');
            $table->integer('qualification_id');
            $table->integer('field_of_study_id');
            $table->char('school_id',13);
            $table->unsignedInteger('class_id');
            $table->unsignedInteger('core_subject_id');
            $table->integer('elective_subject_one_id');
            $table->integer('elective_subject_two_id');
            $table->integer('elective_subject_three_id');
            $table->integer('employee_status_type_id');
            $table->enum('marital_status',['Married','Single','Divorced','Widow']);
            $table->integer('user_id');
            $table->timestamps();
            $table->integer('version')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
