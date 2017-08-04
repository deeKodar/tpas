<?php

use Illuminate\Database\Seeder;

class DzongkhagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dzongkhag = new \App\Models\Dzongkhag([
            'id' => '01',
            'name' => 'Bumthang'
        ]);
        $dzongkhag->save();

        $dzongkhag = new \App\Models\Dzongkhag([
            'id' => '02',
            'name' => 'Chukha'
        ]);
        $dzongkhag->save();

        $dzongkhag = new \App\Models\Dzongkhag([
            'id' => '03',
            'name' => 'Dagana'
        ]);
        $dzongkhag->save();
    }
}
