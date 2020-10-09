<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompaniesTableSeeder extends Seeder
{
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        // Company::truncate();

        // $faker = \Faker\Factory::create();

        Company::create([
            'user_id' => 1,
            'company_name' => 'Prego',
            'office_number' => 'F147',
            'owner_name' => 'Christian',
            'logo_img' => 'pic1.jpg',
        ]);
    }
}
