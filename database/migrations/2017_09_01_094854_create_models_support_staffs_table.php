<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelsSupportStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('models_support_staffs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->char('employee_id',12)->unique();
            $table->string('position_title');
            $table->string('position_level');
            $table->enum('gender',['M','F']);
            $table->date('date_of_birth');
            $table->unsignedInteger('employment_type_id');
            $table->integer('field_of_study_id');
            $table->date('initial_appointment_date');
            $table->date('current_appointment_date');
            $table->integer('qualification_id');
            $table->integer('school_id');
            $table->integer('dzongkhag_id');
            $table->string('hometown');
            $table->integer('teacher_status_type_id');
            $table->integer('version')->default('1');
            $table->softDeletes();
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
        Schema::dropIfExists('models_support_staffs');
    }
}
