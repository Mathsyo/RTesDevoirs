<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $cruds = [
            'users',
            'roles',
            'permissions',
            'homeworks',
            'teachers',
            'courses',
        ];

        $actions = [
            'list',
            'create',
            'read',
            'update',
            'delete',
        ];

        $permissions = [];
        foreach ($cruds as $crud) {
            foreach ($actions as $action) {
                $permissions[] = $crud . '-' . $action;
            }
        }

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $roles = [
            'admin' => $permissions,
            'student' => [
                'homeworks-list',
                'homeworks-create',
                'homeworks-read',
                // 'homeworks-update',
                // 'homeworks-delete',
                'teachers-list',
                // 'teachers-create',
                'teachers-read',
                // 'teachers-update',
                // 'teachers-delete',
                'courses-list',
                // 'courses-create',
                'courses-read',
                // 'courses-update',
                // 'courses-delete',
            ],
        ];

        foreach ($roles as $role => $permissions) {
            $role = Role::create(['name' => $role]);
            $role->givePermissionTo($permissions);
        }
    }
}
