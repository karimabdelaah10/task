<?php

namespace Database\Seeders;

use App\Modules\User\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        dump('Start Seeding Users');
        User::factory(50)->create();
        dump('End Seeding Users');
    }
}
