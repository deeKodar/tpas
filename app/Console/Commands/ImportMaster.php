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
        $this->importGewogs();
        $this->importMaster('position_titles',new PositionTitle);
        $this->importMaster('position_levels',new PositionLevel);
        $this->importMaster('nationalities',new Nationality);
        $this->importSchoolLevels();
        $this->importRolesPermissions('roles',new Role);
        $this->importRolesPermissions('permissions',new Permission);
        $this->importPermissionsRolesPivot();
        
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
                        $this->error('Something went wrong!');
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
  

}
