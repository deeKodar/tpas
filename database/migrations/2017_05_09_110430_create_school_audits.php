<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolAudits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_audits', function (Blueprint $table) {
            $table->bigIncrements('audit_serial');
            $table->char('school_id',13);
            $table->string('name');
            $table->char('school_level_id',4);
            $table->char('dzongkhag_id',2);
            $table->integer('school_status_type_id');
            $table->integer('user_id');
            $table->timestamps();
            $table->char('cmd_flag',1);
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
        Schema::dropIfExists('school_audits');
    }
}
