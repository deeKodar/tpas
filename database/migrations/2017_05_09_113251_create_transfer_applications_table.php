<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransferApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      //
      Schema::create('transfer_applications', function (Blueprint $table) {
          $table->increments('id');
          $table->char('employee_id', 12)->unique();
          $table->char('citizenship', 11)->unique();
          $table->unsignedInteger('transfer_type_id');
          $table->char('spouse_teacher_employee_id', 12)->nullable();
          $table->string('spouse_name')->nullable();
          $table->text('spouse_employment_details')->nullable();
          $table->unsignedInteger('transfer_ground_id');
          $table->char('dzongkhag_id_one', 2);
          $table->char('dzongkhag_id_two', 2);
          $table->char('dzongkhag_id_three', 2);
          $table->text('transfer_reason');
          $table->unsignedInteger('transfer_stage_id');
          $table->unsignedInteger('user_id');
          $table->timestamps();
          $table->unsignedInteger('version');

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
      Schema::dropIfExists('transfer_applications');
    }
}
