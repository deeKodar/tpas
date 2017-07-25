<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherContractRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('teacher_contract_records', function (Blueprint $table) {
        $table->increments('id');
        $table->char('employee_id', 12)->unique();
        $table->unsignedInteger('contract_type_id');
        $table->date('start_date');
        $table->date('end_date');
        $table->text('remarks');
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
        Schema::dropIfExists('teacher_contract_records');
    }
}
