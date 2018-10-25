<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
            //$table->primary('id');
            $table->char('school_code',13)->nullable();
            $table->string('name');
            $table->integer('school_level_id');
            $table->integer('dzongkhag_id')
            ->references('id')
            ->on('dzongkhag');
            $table->integer('school_status_type_id');
            $table->integer('user_id');
            $table->timestamps();
            $table->integer('version');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schools');
    }
}
