<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dzongkhag;
use App\Models\SubjectType;
use App\Models\TransferGround;
use App\Models\TransferStage;
use App\Models\TransferType;
use App\Models\ContractType;
use App\Models\LeaveType;
use App\Models\TeacherStatusType;
use App\Models\ProjectionType;
use App\Models\SchoolLevel;
use App\Models\SchoolStatusType;
use Illuminate\Database\Eloquent\Model;


class ImportMasterTables extends Controller
{
    public function index() {
    		 
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
    	//$this->importMaster('school_levels',new SchoolLevel);


    }
    public function importMaster($filename, Model $model) {
    		if (($handle = fopen ( public_path () . '/master/'.$filename.'.csv', 'r' )) !== FALSE) {
    			echo "Importing ".$filename." tables...<br/>";
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
						echo "Duplicate Entry";
						return;

					}
				}

			fclose ( $handle );
			echo $i." entries successfully added in the ".$filename." table.<br/>";
		}

    }
    
    public function importDzongkhags() {
    		if (($handle = fopen ( public_path () . '/master/dzongkhags.csv', 'r' )) !== FALSE) {
    			echo "Importing dzongkhag tables...<br/>";
    			$i=0;
				while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {
					$data = [
						'code' => $data[0],
						'name' => $data[1],
					];
					try {
						 if(Dzongkhag::firstOrCreate($data)){
						 	$i++;

						}
					} catch(\Exception $e) {
						echo "Duplicate Entry";
						return;

					}
				}

			fclose ( $handle );
			echo $i." entries added successfully in the Dzongkhags table <br/>";
		}
    }

  
}

