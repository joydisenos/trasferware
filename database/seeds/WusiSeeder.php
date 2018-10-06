<?php

use Illuminate\Database\Seeder;

class WusiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $userData = [

            'name' => 'Presidente',

            'email' => 'precidente@wusi.com',

            'password' => \Illuminate\Support\Facades\Hash::make('1234'),

            'status_id' => 1

        ];

        \App\Models\User::create($userData);


    }
}
