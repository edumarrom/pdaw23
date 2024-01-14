<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin permissions
        Permission::create([
            'name' => 'admin-cpanel',
        ]);

        Permission::create([
            'name' => 'teacher-cpanel',
        ]);

        // Course permissions
        Permission::create([
            'name' => 'course-create',
        ]);

        Permission::create([
            'name' => 'course-read',
        ]);

        Permission::create([
            'name' => 'course-edit',
        ]);

        Permission::create([
            'name' => 'course-delete',
        ]);
    }
}
