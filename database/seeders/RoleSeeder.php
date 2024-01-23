<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public $permissions = [
        'courses' => ['course-create', 'course-read', 'course-edit', 'course-delete'],
        'levels' => ['level-create', 'level-read', 'level-edit', 'level-delete'],
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create([
            'name' => 'admin',
        ]);

        $admin->givePermissionTo([
            'admin-cpanel',
            'teacher-cpanel',
            $this->permissions['courses'],
            $this->permissions['levels'],
        ]);

        $teacher = Role::create([
            'name' => 'teacher',
        ]);

        $teacher->givePermissionTo([
            'teacher-cpanel',
            'course-create',
            'course-read',
            'course-edit',
            'course-delete',
        ]);

        Role::create([
            'name' => 'student',
        ]);
    }
}
