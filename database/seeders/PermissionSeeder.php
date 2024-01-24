<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public $permissions = [
        ['course-create', 'course-read', 'course-edit', 'course-delete'],
        ['level-create', 'level-read', 'level-edit', 'level-delete'],
    ];
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

        foreach ($this->permissions as $permission) {
            Permission::create([
                'name' => $permission[0],
            ]);

            Permission::create([
                'name' => $permission[1],
            ]);

            Permission::create([
                'name' => $permission[2],
            ]);

            Permission::create([
                'name' => $permission[3],
            ]);
        }
    }
}
