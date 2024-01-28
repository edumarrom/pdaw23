<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    private $models = [
        'role',
        'user',
        'category',
        'level',
        'course',
        'price',
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
        ]);

        $this->bulkGivePermissions($admin, $this->models);

        $teacher = Role::create([
            'name' => 'teacher',
        ]);

        $teacher->givePermissionTo([
            'teacher-cpanel',
            'course-create',
            'course-read',
            'course-update',
            'course-delete',
        ]);
    }

    /* private function getCrudPermissions($model)
    {
        $permissions = [];
        $actions = ['create', 'read', 'update', 'delete'];
        foreach ($actions as $action){
            $permissions[] = $model . '-' . $action;
        }

        return $permissions;
    } */

    private function bulkGivePermissions($role, $models)
    {
        foreach ($models as $model){
            $actions = ['create', 'read', 'update', 'delete'];
            foreach ($actions as $action){
                $role->givePermissionTo($model . '-' . $action);
            }
        }
    }
}
