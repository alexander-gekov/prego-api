<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'role_name' => 'admin',
        ]);

        Role::create([
            'role_name' => 'building manager',
        ]);

        Role::create([
            'role_name' => 'owner',
        ]);
        Role::create([
            'role_name' => 'employee',
        ]);
    }
}
