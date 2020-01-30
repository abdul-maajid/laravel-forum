<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'admin',
            'password' => bcrypt('admin'),
            'email' => 'admin@laravel.com',
            'admin' => 1,
            'avatar' => asset('avatars/avatar.png')
        ]);
        
        App\User::create([
            'name' => 'Emily Khatti',
            'password' => bcrypt('password'),
            'email' => 'emaily@laravel.com',
            'avatar' => asset('avatars/avatar.png')
        ]);
    }
}
