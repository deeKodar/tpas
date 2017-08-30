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
            $table->string('name');
            $table->char('employee_id',12)->unique();
            $table->string('position_title');
            $table->string('position_level');
            $table->enum('gender',['M','F']);
            $table->date('date_of_birth');
            $table->unsignedInteger('employment_type_id');
            $table->date('initial_appointment_date');
            $table->date('current_appointment_date');
            $table->integer('school_id');
            $table->integer('dzongkhag_id');
            $table->integer('initial_qualification_id');
            $table->integer('current_qualification_id');
            $table->integer('field_of_study_id');
            $table->integer('subject_one_id');
            $table->integer('subject_two_id');
            $table->integer('subject_three_id')->nullable();
            $table->integer('core_subject_id');
            $table->date('contract_from')->nullable();
            $table->date('contract_to')->nullable();
            $table->string('remarks')->nullable();
            $table->string('hometown');
            $table->integer('teacher_status_type_id');
            $table->enum('marital_status',['Married','Single','Divorced','Widow']);
            $table->integer('user_id');
            $table->timestamps();
            $table->integer('version')->default('1');
            $table->softDeletes();
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
