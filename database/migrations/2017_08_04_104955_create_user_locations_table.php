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
            $table->integer('dzongkhag_id')
            ->references('id')
            ->on('dzongkhag');

            $table->integer('school_id')
            ->references('id')
            ->on('school');

            $table->integer('user_location_type_id')
            ->references('id')
            ->on('user_location_type');
            
            
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
