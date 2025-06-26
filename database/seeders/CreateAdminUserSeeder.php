<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Zesan',
            'email' => 'gmzesan7767@gmail.com',
            'password' => bcrypt('12345678aA'),
        ]);
        $admin = User::create([
            'name' => 'Mini LMS',
            'email' => 'minilms@gmail.com',
            'password' => bcrypt('minilms1234'),
            'image' => 'all-users/3I2vFfxifFEZR1asY1axFZITHEMmgG4rkDcr8gkX.png',
        ]);
        $permissions = Permission::pluck('id','name')->all();
        $permissionsAdmin = Permission::whereNotIn('name', ['user-list', 'user-create', 'user-edit', 'user-delete','role-list', 'role-create', 'role-edit', 'role-delete'])->pluck('id','name')->all();

        $user->assignRole('superadmin');
        $admin->assignRole('admin');

        // superadmin
        $superAdminRole = Role::findByName('superadmin');
        $superAdminRole->givePermissionTo($permissions);
        // admin
        $adminRole = Role::findByName('admin');
        $adminRole->givePermissionTo($permissionsAdmin);

    }
}
