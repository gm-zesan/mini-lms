<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
    */
    public function run(): void
    {
        $this->call(
            [
                PermissionTableSeeder::class,
                RoleSeeder::class,
                CreateAdminUserSeeder::class,
                CourseSeeder::class,
                // EnrollmentSeeder::class,
                // OurTeamSeeder::class,
            ]
        );
    }
}
