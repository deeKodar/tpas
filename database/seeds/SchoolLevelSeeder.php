<?php

use Illuminate\Database\Seeder;

class SchoolLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schoolLevel = new \App\Models\SchoolLevel([
            'name' => 'Primary School'
        ]);
        $schoolLevel->save();

        $schoolLevel = new \App\Models\SchoolLevel([
            'name' => 'Lower Secondary High School'
        ]);
        $schoolLevel->save();
    }
}
