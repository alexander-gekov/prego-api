<?php

namespace Database\Seeders;
// namespace App\Models;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Let's clear the users table first
        // User::truncate();

        // $faker = \Faker\Factory::create();

        // Let's make sure everyone has the same password and 
        // let's hash it before the loop, or else our seeder 
        // will be too slow.
        // $password = Hash::make('1234');

        User::create([
            'username' => 'tester',
            'password' => '123',
            'email' => 'tester@test.com',
        ]);

        User::create([
            'username' => 'building.owner',
            'password' => '456',
            'email' => 'building.owner@test.com',
        ]);
    }
}
