<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = array(
            array('id' => '1','name' => 'superadmin', 'description' => 'All permission and access are enabled for this role', 'guard_name' => 'web'),
            array('id' => '2','name' => 'admin', 'description' => 'Admin can observe everything without role', 'guard_name' => 'web'),
            array('id' => '3','name' => 'student', 'description' => 'Student can observe everything without role', 'guard_name' => 'web'),
            array('id' => '4','name' => 'teacher', 'description' => 'Teacher cannot do anything', 'guard_name' => 'web'),
        );
        foreach($datas as $data)
        {
            Role::create($data);
        }
    }
}
