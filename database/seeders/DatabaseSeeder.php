<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'utype' => 'USR',
            // 'street' => '123 Main St',
            // 'city' => 'New York',
            // 'state' => 'NY',
            // 'country' => 'USA',
            // 'zip' => '10001',
            // 'fname' => 'John',
            // 'lname' => 'Doe',
            'img' => 'https://s3.amazonaws.com/37assets/svn/765-default-avatar.png',
            // 'phone' => '1234567890',
        ]);
    }
}
