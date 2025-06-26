<?php



namespace Database\Seeders;



use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;



class PermissionTableSeeder extends Seeder

{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $permissions = [
            // role
            ['name' => 'role-list', 'display_name' => 'Role list', 'module' => 'role'],
            ['name' => 'role-create', 'display_name' => 'Role create', 'module' => 'role'],
            ['name' => 'role-edit', 'display_name' => 'Role edit', 'module' => 'role'],
            ['name' => 'role-delete', 'display_name' => 'Role delete', 'module' => 'role'],

            // user
            ['name' => 'user-list', 'display_name' => 'User list', 'module' => 'user'],
            ['name' => 'user-create', 'display_name' => 'User create', 'module' => 'user'],
            ['name' => 'user-edit', 'display_name' => 'User edit', 'module' => 'user'],
            ['name' => 'user-delete', 'display_name' => 'User delete', 'module' => 'user'],

            // student
            ['name' => 'student-list', 'display_name' => 'Student list', 'module' => 'student'],
            ['name' => 'student-create', 'display_name' => 'Student create', 'module' => 'student'],
            ['name' => 'student-edit', 'display_name' => 'Student edit', 'module' => 'student'],
            ['name' => 'student-delete', 'display_name' => 'Student delete', 'module' => 'student'],

            // teacher
            ['name' => 'teacher-list', 'display_name' => 'Teacher list', 'module' => 'teacher'],
            ['name' => 'teacher-create', 'display_name' => 'Teacher create', 'module' => 'teacher'],
            ['name' => 'teacher-edit', 'display_name' => 'Teacher edit', 'module' => 'teacher'],
            ['name' => 'teacher-delete', 'display_name' => 'Teacher delete', 'module' => 'teacher'],

            // course
            ['name' => 'course-list', 'display_name' => 'Course list', 'module' => 'course'],
            ['name' => 'course-create', 'display_name' => 'Course create', 'module' => 'course'],
            ['name' => 'course-edit', 'display_name' => 'Course edit', 'module' => 'course'],
            ['name' => 'course-delete', 'display_name' => 'Course delete', 'module' => 'course'],
            ['name' => 'course-certificate-status', 'display_name' => 'Course certificate status', 'module' => 'course'],

            // enrollment
            ['name' => 'enrollment-list', 'display_name' => 'Enrollment list', 'module' => 'enrollment'],
            ['name' => 'enrollment-create', 'display_name' => 'Enrollment create', 'module' => 'enrollment'],
            ['name' => 'enrollment-edit', 'display_name' => 'Enrollment edit', 'module' => 'enrollment'],
            ['name' => 'enrollment-delete', 'display_name' => 'Enrollment delete', 'module' => 'enrollment'],

            // review
            ['name' => 'review-list', 'display_name' => 'Review list', 'module' => 'review'],
            ['name' => 'review-create', 'display_name' => 'Review create', 'module' => 'review'],
            ['name' => 'review-edit', 'display_name' => 'Review edit', 'module' => 'review'],
            ['name' => 'review-delete', 'display_name' => 'Review delete', 'module' => 'review'],

            // contact
            ['name' => 'contact-list', 'display_name' => 'Contact list', 'module' => 'contact'],
            ['name' => 'contact-delete', 'display_name' => 'Contact delete', 'module' => 'contact'],

            // our-team
            ['name' => 'our-team-list', 'display_name' => 'Our Team list', 'module' => 'our-team'],
            ['name' => 'our-team-create', 'display_name' => 'Our Team create', 'module' => 'our-team'],
            ['name' => 'our-team-edit', 'display_name' => 'Our Team edit', 'module' => 'our-team'],
            ['name' => 'our-team-delete', 'display_name' => 'Our Team delete', 'module' => 'our-team'],

        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }

}
