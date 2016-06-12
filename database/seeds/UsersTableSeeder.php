<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::truncate();
        User::create([
            'name'     => 'admin',
            'email'    => 'admin@email.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
