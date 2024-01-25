<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    private $models = [
        'category',
        'level',
        'price',
        'course',
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

        $this->bulkCreatePermissions($this->models);
    }

    private function bulkCreatePermissions($models)
    {
        foreach ($models as $model){
            $actions = ['create', 'read', 'edit', 'delete'];
            foreach ($actions as $action){
                Permission::create([
                    'name' => $model . '-' . $action,
                ]);
            }
        }
    }
}
