<?php

use Illuminate\Database\Seeder;

class SchoolStatusTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schoolStatusType = new \App\Models\SchoolStatusType([
            'name' => 'Running'
        ]);
        $schoolStatusType->save();

        $schoolStatusType = new \App\Models\SchoolStatusType([
            'name' => 'Closed'
        ]);
        $schoolStatusType->save();
    }
}
