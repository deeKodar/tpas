<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransferSchoolHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      //
      Schema::create('transfer_school_histories', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('transfer_application_id');
          $table->char('school_id', 13);
          $table->date('from_date');
          $table->date('to_date');
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
      Schema::dropIfExists('transfer_school_histories');
    }
}
