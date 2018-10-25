<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerOnInsertSubjectSchoolClass extends Migration
{
    // /**
    //  * Run the migrations.
    //  *
    //  * @return void
    //  */
    // public function up()
    // {
    //     //DB::unprepared('CREATE TRIGGER trig_insert_standard_subject_hours AFTER INSERT ON `subject_school_class` FOR EACH ROW
    //     DB::unprepared('CREATE TRIGGER trig_insert_standard_subject_hours AFTER INSERT ON `school_class_subject` FOR EACH ROW
    //                     BEGIN
    //                     INSERT INTO `standard_subject_hours`(`school_class_id`, `subject_id`, `created_at`, `updated_at`) VALUES (NEW.school_class_id, NEW.subject_id, NOW(), NOW());
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
    //     DB::unprepared('DROP TRIGGER `trig_insert_standard_subject_hours`');
    // }
}
