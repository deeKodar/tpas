<?php

use Illuminate\Database\Seeder;

class SchoolClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schoolClass = new \App\Models\SchoolClass([
            'name' => 'Class PP'
        ]);
        $schoolClass->save();

        $schoolClass = new \App\Models\SchoolClass([
            'name' => 'Class I'
        ]);
        $schoolClass->save();

        $schoolClass = new \App\Models\SchoolClass([
            'name' => 'Class II'
        ]);
        $schoolClass->save();

        $schoolClass = new \App\Models\SchoolClass([
            'name' => 'Class III'
        ]);
        $schoolClass->save();
        $schoolClass = new \App\Models\SchoolClass([
            'name' => 'Class IV'
        ]);
        $schoolClass->save();
        $schoolClass = new \App\Models\SchoolClass([
            'name' => 'Class V'
        ]);
        $schoolClass->save();
        $schoolClass = new \App\Models\SchoolClass([
            'name' => 'Class VI'
        ]);
        $schoolClass->save();
        $schoolClass = new \App\Models\SchoolClass([
            'name' => 'Class VII'
        ]);
        $schoolClass->save();

        $schoolClass = new \App\Models\SchoolClass([
            'name' => 'Class VIII'
        ]);
        $schoolClass->save();

        $schoolClass = new \App\Models\SchoolClass([
            'name' => 'Class IX'
        ]);
        $schoolClass->save();

        $schoolClass = new \App\Models\SchoolClass([
            'name' => 'Class X'
        ]);
        $schoolClass->save();

        $schoolClass = new \App\Models\SchoolClass([
            'name' => 'Class XI - Arts'
        ]);
        $schoolClass->save();

        $schoolClass = new \App\Models\SchoolClass([
            'name' => 'Class XI - Commerce'
        ]);
        $schoolClass->save();

        $schoolClass = new \App\Models\SchoolClass([
            'name' => 'Class XI - Science'
        ]);
        $schoolClass->save();

        $schoolClass = new \App\Models\SchoolClass([
            'name' => 'Class XII - Arts'
        ]);
        $schoolClass->save();

        $schoolClass = new \App\Models\SchoolClass([
            'name' => 'Class XII - Commerce'
        ]);
        $schoolClass->save();

        $schoolClass = new \App\Models\SchoolClass([
            'name' => 'Class XII - Science'
        ]);
        $schoolClass->save();
    }
}
