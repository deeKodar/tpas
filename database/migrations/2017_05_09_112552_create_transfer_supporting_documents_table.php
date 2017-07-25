<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransferSupportingDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      //
      Schema::create('transfer_supporting_documents', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('document_url');
          $table->unsignedInteger('transfer_application_id');
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
      Schema::dropIfExists('transfer_supporting_documents');
    }
}
