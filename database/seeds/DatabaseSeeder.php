<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $user =  factory(App\User::class)->create(

            [
                'first_name' => 'berg',
                'last_name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456')

            ]

        );
    }
}
