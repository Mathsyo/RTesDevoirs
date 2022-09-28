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

        // Create default permissions
        // Permission::create(['name' => 'list courses']);
        // Permission::create(['name' => 'view courses']);
        // Permission::create(['name' => 'create courses']);
        // Permission::create(['name' => 'update courses']);
        // Permission::create(['name' => 'delete courses']);

        // Permission::create(['name' => 'list donehomeworks']);
        // Permission::create(['name' => 'view donehomeworks']);
        // Permission::create(['name' => 'create donehomeworks']);
        // Permission::create(['name' => 'update donehomeworks']);
        // Permission::create(['name' => 'delete donehomeworks']);

        // Permission::create(['name' => 'list homeworks']);
        // Permission::create(['name' => 'view homeworks']);
        // Permission::create(['name' => 'create homeworks']);
        // Permission::create(['name' => 'update homeworks']);
        // Permission::create(['name' => 'delete homeworks']);

        // Permission::create(['name' => 'list teachers']);
        // Permission::create(['name' => 'view teachers']);
        // Permission::create(['name' => 'create teachers']);
        // Permission::create(['name' => 'update teachers']);
        // Permission::create(['name' => 'delete teachers']);

        // // Create user role and assign existing permissions
        // $currentPermissions = Permission::all();
        // $userRole = Role::create(['name' => 'user']);
        // $userRole->givePermissionTo($currentPermissions);

        // // Create admin exclusive permissions
        // Permission::create(['name' => 'list roles']);
        // Permission::create(['name' => 'view roles']);
        // Permission::create(['name' => 'create roles']);
        // Permission::create(['name' => 'update roles']);
        // Permission::create(['name' => 'delete roles']);

        // Permission::create(['name' => 'list permissions']);
        // Permission::create(['name' => 'view permissions']);
        // Permission::create(['name' => 'create permissions']);
        // Permission::create(['name' => 'update permissions']);
        // Permission::create(['name' => 'delete permissions']);

        // Permission::create(['name' => 'list users']);
        // Permission::create(['name' => 'view users']);
        // Permission::create(['name' => 'create users']);
        // Permission::create(['name' => 'update users']);
        // Permission::create(['name' => 'delete users']);

        // // Create admin role and assign all permissions
        // $allPermissions = Permission::all();
        // $adminRole = Role::create(['name' => 'super-admin']);
        // $adminRole->givePermissionTo($allPermissions);

        // $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        // if ($user) {
        //     $user->assignRole($adminRole);
        // }

        $cruds = [
            'users',
            'roles',
            'permissions',
            'homeworks',
            'teachers',
            'courses',
            // Add more here
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
            'user' => [
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
