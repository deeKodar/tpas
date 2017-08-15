<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_locations', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('hq_id')
            ->nullable();

            $table->integer('dzongkhag_id')
            ->references('id')
            ->on('dzongkhag')
            ->nullable();



            $table->integer('school_id')
            ->references('id')
            ->on('school')
            ->nullale();

            
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_locations');
    }
}
