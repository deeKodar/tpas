<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Dzongkhag;
use App\Models\SubjectType;
use App\Models\TransferGround;
use App\Models\TransferStage;
use App\Models\TransferType;
use App\Models\ContractType;
use App\Models\LeaveType;
use App\Models\TeacherStatusType;
use App\Models\PositionLevel;
use App\Models\PositionTitle;
use App\Models\ProjectionType;
use App\Models\SchoolLevel;
use App\Models\SchoolStatusType;
use App\Models\TeacherEmploymentType;
use App\Models\Qualification;
use App\Models\FieldOfStudy;
use App\Models\Gewog;
use App\Models\Nationality;
use App\Models\Role;
use App\Models\Permission;
use App\Models\PermissionRole;
use App\Models\Hometown;
use App\Models\Teacher;
use App\Models\School;
use App\Models\SchoolClass;
use App\Models\SchoolClassSubject;
use App\Models\Subject;
use App\Models\ClassType;
use App\Models\StandardSubjectHour;
use Illuminate\Database\Eloquent\Model;


class ImportMaster extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'master:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import TPAS master tables';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->importDzongkhags();
        $this->importMaster('subject_types', new SubjectType);
        $this->importMaster('transfer_grounds',new TransferGround);
        $this->importMaster('transfer_stages',new TransferStage);
        $this->importMaster('transfer_types',new TransferType);
        $this->importMaster('contract_types',new ContractType);
        $this->importMaster('leave_types',new LeaveType);
        $this->importMaster('teacher_status_types',new TeacherStatusType);
        $this->importMaster('projection_types',new ProjectionType);
        $this->importMaster('school_status_types',new SchoolStatusType);
        $this->importMaster('employment_types',new TeacherEmploymentType);
        $this->importMaster('qualification_types',new Qualification);
        $this->importMaster('field_types',new FieldOfStudy);
        $this->importMaster('home_towns', new Hometown);
        $this->importGewogs();
        $this->importMaster('position_titles',new PositionTitle);
        $this->importMaster('position_levels',new PositionLevel);
        $this->importMaster('nationalities',new Nationality);
        $this->importSchoolLevels();
        $this->importRolesPermissions('roles',new Role);
        $this->importRolesPermissions('permissions',new Permission);
        $this->importTeachers();
        $this->importPermissionsRolesPivot();
        $this->importSchools('schools', new School);
        $this->importMaster('school_classes', new SchoolClass);
        $this->importMaster('subjects', new Subject);
        $this->importClassSubject('school_class_subject',new SchoolClassSubject);
        $this->importMaster('classes', new ClassType);
        $this->importStandardSubjectHour('standard_subject_hour', new StandardSubjectHour);

    }

    public function importSchools($filename, Model $model) {

      if (($handle = fopen ( public_path () . '/master/'.$filename.'.csv', 'r' )) !== FALSE) {
          $this->line("Importing ".$filename." tables...");
          $i=0;
          while ( ($data = fgetcsv ( $handle, ',' )) !== FALSE ) {
              $data = [
                  'id' => $data[0],
                  'school_code' => $data[1],
                  'name' => $data[2],
                  'school_level_id' => $data[3],
                  'dzongkhag_id' => $data[4],
                  'school_status_type_id' => $data[5],
                  'user_id' => 1,
                  'version' => 1

              ];
               try {
                  if($model::firstOrCreate($data)) {
                      $i++;
                  }
              } catch(\Exception $e) {
                  $this->error('Something went wrong!'.$e);
                  return;

              }
          }

      fclose ( $handle );
      $this->line($i." entries successfully added in the ".$filename." table.");
  }


}

public function importStandardSubjectHour($filename, Model $model) {

  if (($handle = fopen ( public_path () . '/master/'.$filename.'.csv', 'r' )) !== FALSE) {
      $this->line("Importing ".$filename." tables...");
      $i=0;
      while ( ($data = fgetcsv ( $handle, ',' )) !== FALSE ) {
          $data = [

              'school_class_id' => $data[0],
              'subject_id' => $data[1],
              'standard_hour' => $data[2],
              'standard_minute' => $data[3],

          ];
           try {
              if($model::firstOrCreate($data)) {
                  $i++;
              }
          } catch(\Exception $e) {
              $this->error('Something went wrong!');
              return;

          }
      }

  fclose ( $handle );
  $this->line($i." entries successfully added in the ".$filename." table.");
}



}

 public function importMaster($filename, Model $model) {
            if (($handle = fopen ( public_path () . '/master/'.$filename.'.csv', 'r' )) !== FALSE) {
                $this->line("Importing ".$filename." tables...");
                $i=0;
                while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {
                    $data = [
                        'id' => $data[0],
                        'name' => $data[1],
                    ];
                     try {
                        if($model::firstOrCreate($data)) {
                            $i++;
                        }
                    } catch(\Exception $e) {
                        $this->error('Something went wrong!'.$e);
                        return;

                    }
                }

            fclose ( $handle );
            $this->line($i." entries successfully added in the ".$filename." table.");
        }

    }

    public function importClassSubject($filename, Model $model) {
               if (($handle = fopen ( public_path () . '/master/'.$filename.'.csv', 'r' )) !== FALSE) {
                   $this->line("Importing ".$filename." tables...");
                   $i=0;
                   while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {
                       $data = [
                           'subject_id' => $data[1],
                           'school_class_id' => $data[0],
                       ];
                        try {
                           if($model::firstOrCreate($data)) {
                               $i++;
                           }
                       } catch(\Exception $e) {
                           $this->error('Something went wrong!'.$e);
                           return;

                       }
                   }

               fclose ( $handle );
               $this->line($i." entries successfully added in the ".$filename." table.");
           }

       }

    public function importDzongkhags() {
            if (($handle = fopen ( public_path () . '/master/dzongkhags.csv', 'r' )) !== FALSE) {
                $this->line("Importing dzongkhag tables...");
                $i=0;
                while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {
                    $data = [
                        'id' => $data[0],
                        'name' => $data[1],
                    ];
                    try {
                         if(Dzongkhag::firstOrCreate($data)){
                            $i++;

                        }
                    } catch(\Exception $e) {
                       $this->error('Something went wrong!');
                        return;

                    }
                }

            fclose ( $handle );
            $this->line($i." entries added successfully in the Dzongkhags table");
        }
    }

    public function importGewogs() {
            if (($handle = fopen ( public_path () . '/master/gewogs.csv', 'r' )) !== FALSE) {
                $this->line("Importing gewog tables...");
                $i=0;
                while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {
                    $data = [
                        'id' => $data[0],
                        'dzongkhag_id' => $data[1],
                        'name' => $data[2],

                    ];
                    try {
                         if(Gewog::firstOrCreate($data)){
                            $i++;

                        }
                    } catch(\Exception $e) {
                        $this->error('Something went wrong!');
                        return;

                    }
                }

            fclose ( $handle );
            $this->line($i." entries added successfully in the Gewogs table");
        }
    }

    public function importSchoolLevels() {
        if (($handle = fopen ( public_path () . '/master/school_levels.csv', 'r' )) !== FALSE) {
                $this->line("Importing school_levels tables...");
                $i=0;
                while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {
                    $data = [
                        'id' => $data[0],
                        'code' => $data[1],
                        'name' => $data[2],
                    ];
                    try {
                         if(SchoolLevel::firstOrCreate($data)){
                            $i++;

                        }
                    } catch(\Exception $e) {
                        $this->error('Something went wrong!');
                        return;

                    }
                }

            fclose ( $handle );
            $this->line($i." entries added successfully in the School Levels table");
        }

    }

public function importRolesPermissions($filename, Model $model) {
            if (($handle = fopen ( public_path () . '/master/'.$filename.'.csv', 'r' )) !== FALSE) {
                $this->line("Importing ".$filename." tables...");
                $i=0;
                while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {
                    $data = [
                        'id' => $data[0],
                        'name' => $data[1],
                        'label' => $data[2],
                    ];
                     try {
                        if($model::firstOrCreate($data)) {
                            $i++;
                        }
                    } catch(\Exception $e) {
                        $this->error('Something went wrong!');
                        return;

                    }
                }

            fclose ( $handle );
            $this->line($i." entries successfully added in the ".$filename." table.");
        }

    }

    public function importPermissionsRolesPivot() {

         if (($handle = fopen ( public_path () . '/master/permission_role.csv', 'r' )) !== FALSE) {
                $this->line("Importing roles and permissions...");
                $i=0;
                while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {
                    $data = [

                        'permission_id' => $data[0],
                        'role_id' => $data[1],
                    ];
                    try {
                         if(PermissionRole::firstOrCreate($data)){
                            $i++;

                        }
                    } catch(\Exception $e) {
                        $this->error('Something went wrong!');
                        return;

                    }
                }

            fclose ( $handle );
            $this->line($i." entries added successfully in the permission_roles table");
        }

    }


    public function importTeachers() {
            if (($handle = fopen ( public_path () . '/master/teachers.csv', 'r' )) !== FALSE) {
                $this->line("Importing teachers...");
                $i=0;
                while ( ($data = fgetcsv ( $handle, 0, ',' )) !== FALSE ) {
                    $data = [

                        'name' => $data[1],
                        'employee_id' => $data[2],
                        'position_title' => $data[3],
                        'position_level' => $data[4],
                        'gender' => $data[5],
                        'date_of_birth' => $data[6],
                        'employment_type_id' => $data[7],
                        'initial_appointment_date' => $data[8],
                        'current_appointment_date' => $data[9],
                        'school_id' => $data[10],
                        'dzongkhag_id' => $data[11],
                        'initial_qualification_id' =>$data[12],
                        'current_qualification_id' =>$data[13],
                        'field_of_study_id' => $data[14],
                        'subject_one_id' => $data[15],
                        'subject_two_id' => $data[16],
                        'subject_three_id' => $data[17],
                        'core_subject_id' => $data[18],
                        'contract_from' => $data[19],
                        'contract_to' => $data[20],
                        'remarks' => $data[21],
                        'hometown' => $data[22],
                        'teacher_status_type_id' => $data[23],
                        'marital_status' => 'Single',
                        'user_id' => 1,
                        'version' =>1

                    ];
                    try {
                         if(Teacher::firstOrCreate($data)){
                            $i++;

                        }
                    } catch(\Exception $e) {
                       $this->error('Something went wrong!'.$e);
                        return;

                    }
                }

            fclose ( $handle );
            $this->line($i." entries added successfully in the Teachers table");
        }
    }


}
