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
        User::create([
            'password' => '123',
            'role_id' => 1,
            'email' => 'tester@test.com',
        ]);

        User::create([
            'password' => '456',
            'role_id' => 3,
            'email' => 'building.owner@test.com',
        ]);
    }
}
