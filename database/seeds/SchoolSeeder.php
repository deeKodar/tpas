<?php

use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $school = new \App\Models\School([
            'school_code' => '1111222233333',
            'name' => 'Tshangkha',
            'school_level_id' => '3',
            'dzongkhag_id' => '17',
            'school_status_type_id' => '1',
            'user_id' => '1',
            'version' => '1'
        ]);
        $school->save();

        $school = new \App\Models\School([
            'school_code' => '3333333333333',
            'name' => 'Zulikha',
            'school_level_id' => '3',
            'dzongkhag_id' => '14',
            'school_status_type_id' => '1',
            'user_id' => '1',
            'version' => '1'
        ]);
        $school->save();
    }
}
