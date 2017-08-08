<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\Models\User([
            'id' => '1',
            'name' => 'Sonam TOBGAY',
            'email' => 'stobgay@dit.gov.bt',
            'role_id' => '1',
            'password' => '$2y$10$CypqnFn5xAoCE/EB/7ctPuinZYBJgleo.1D774YyRLSwZpi4Lk506'
        ]);
        $user->save();

        $user = new \App\Models\User([
            'id' => '2',
            'name' => 'Kuenzang Peldhen',
            'email' => 'sontobdrukpa@gmail.com',
            'role_id' => '4',
            'password' => '$2y$10$CypqnFn5xAoCE/EB/7ctPuinZYBJgleo.1D774YyRLSwZpi4Lk506'
        ]);
        $user->save();
    }
}
