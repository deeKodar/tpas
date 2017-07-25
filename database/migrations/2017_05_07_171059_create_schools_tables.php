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
            $table->char('id',13);
            $table->primary('id');
            $table->string('name');
            $table->char('school_level_id',4);
            $table->char('dzongkhag_id',2);
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
