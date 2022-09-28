<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            ['country_name' => 'United arab emirates','country_code' => 'UAE'],
            ['country_name' => 'Sri Lanka','country_code' => 'LK'],
            ['country_name' => 'India','country_code' => 'IND'],
            ['country_name' => 'Australia','country_code' => 'AU']
        ]
        );
        DB::table('departments')->insert([
            ['department_name' => 'Human Resources'],
            ['department_name' => 'Information Technology'],
            ['department_name' => 'Finance'],
            ['department_name' => 'Production'],
            ['department_name' => 'Research and development']
        ]
        );
        DB::table('designations')->insert([
            ['designation_name' => 'Human Resources manager'],
            ['designation_name' => 'Software Engineer'],
            ['designation_name' => 'Senior Software Engineer'],
            ['designation_name' => 'Associate Tech Lead'],
            ['designation_name' => 'Tech Lead']
        ]
        );
        

    }
}
