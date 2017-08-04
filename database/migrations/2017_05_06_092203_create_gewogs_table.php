<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGewogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create column for gewogs table
        Schema::create('gewogs', function (Blueprint $table) {
           
           $table->increments('id');
            $table->string('name');
            $table->integer('dzongkhag_id')
            ->references('id')
            ->on('dzongkhag');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gewogs');
    }
}
