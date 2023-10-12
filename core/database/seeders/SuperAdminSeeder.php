<?php

namespace Database\Seeders;

use App\Modules\User\User;
use App\Modules\User\UsersEnum;
use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email = 'super_admin@admin.com';
        if (!User::query()->where('email', $email)->exists()) {
            User::query()->create([
                'name' => 'Super Admin',
                'email' => $email,
                'mobile_number' => '01000000000',
                'type' => UsersEnum::ADMIN,
                'password' => bcrypt('12345678'),
            ]);
        }

    }
}
