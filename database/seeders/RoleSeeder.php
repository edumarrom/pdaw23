<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create([
            'name' => 'admin',
        ]);

        $role->givePermissionTo([
            'admin-cpanel',
            'course-create',
            'course-read',
            'course-edit',
            'course-delete',
        ]);

        $role = Role::create([
            'name' => 'teacher',
        ]);

        $role->givePermissionTo([
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
