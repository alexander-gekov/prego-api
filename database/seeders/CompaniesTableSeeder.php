<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        // Company::truncate();

        // $faker = \Faker\Factory::create();
        Company::factory()->count(20)->create();

        Company::create([
            'user_id' => 3,
            'company_name' => 'Prego',
            'office_number' => 'F147',
            'owner_name' => 'Christian',
            'logo_img' => 'pic1.jpg',
        ]);
    }
}
