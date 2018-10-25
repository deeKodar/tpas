<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerOnDeleteSubjectSchoolClass extends Migration
{
    // /**
    //  * Run the migrations.
    //  *
    //  * @return void
    //  */
    // public function up()
    // {
    //     //DB::unprepared('CREATE TRIGGER trig_delete_standard_subject_hours AFTER DELETE ON `subject_school_class` FOR EACH ROW
    //     DB::unprepared('CREATE TRIGGER trig_delete_standard_subject_hours AFTER DELETE ON `school_class_subject` FOR EACH ROW
    //                     BEGIN
    //                     DELETE FROM `standard_subject_hours` WHERE subject_id = OLD.subject_id;
    //                     END'
    //     );
    // }
    //
    // /**
    //  * Reverse the migrations.
    //  *
    //  * @return void
    //  */
    // public function down()
    // {
    //     DB::unprepared('DROP TRIGGER `trig_delete_standard_subject_hours`');
    // }
}
