<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransferApplicationAuditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          //
          Schema::create('transfer_application_audits', function (Blueprint $table) {
          $table->bigIncrements('audit_serial');
          $table->unsignedInteger('transfer_application_id');
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
        Schema::dropIfExists('transfer_application_audits');
    }
}
