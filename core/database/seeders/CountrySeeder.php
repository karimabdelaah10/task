<?php

namespace Database\Seeders;

use App\Modules\Country\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        dump('Start Seeding Countries');
        Country::factory(50)->create();
        dump('End Seeding Countries');
    }
}
