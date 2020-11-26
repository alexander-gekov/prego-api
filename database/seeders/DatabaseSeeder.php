<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\BuildingOwner;
use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        User::factory()->count(2)->buildingManager()->create();
//        $buildingNames = array("A2","B1");

        Company::factory()->count(rand(3,5))
            ->state(function (array $attributes)
//            use ($buildingNames)
            {
                $r = rand(1,2);
                return ['building_owner_id' => $r];
//                        'building_name' => $buildingNames[$r - 1]];
            })
            ->create()
            ->each(function($c)
            {
                Employee::factory()->count(rand(7,11))
                ->state
                    ([
                        'company_id' => $c->id,
                    ])
                ->create()
                ->each(function($e) use ($c)
                {
                    $e->appointments()->saveMany(Appointment::factory()->count(rand(0,3))
                        ->state
                        ([
                            'employee_id' => $e->id,
                        ])
                        ->create());
                });
            });

        BuildingOwner::factory()->count(2)->create();
    }
}
