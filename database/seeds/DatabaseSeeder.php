<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SchoolLevelSeeder::class);
        $this->call(SchoolStatusTypeSeeder::class);
        $this->call(SchoolSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(DzongkhagTableSeeder::class);
    }
}
