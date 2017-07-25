<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherLeaveRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('teacher_leave_records', function (Blueprint $table) {
        $table->increments('id');
        $table->char('employee_id', 12)->unique();
        $table->unsignedInteger('leave_type_id');
        $table->date('start_date');
        $table->date('end_date');
        $table->unsignedInteger('user_id');
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
        //
        Schema::dropIfExists('teacher_leave_records');
    }
}
