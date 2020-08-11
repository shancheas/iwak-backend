<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            [
                'name' => 'Irfan Z',
                'registration_number' => '12332112321',
                'email' => 'irfan@email.com',
                'password' => Hash::make('password1'),
            ],
            [
                'name' => 'Pelajar Pejuang',
                'registration_number' => '12332112322',
                'email' => 'pelajar@email.com',
                'password' => Hash::make('password1'),
            ]
        ]);
    }
}
