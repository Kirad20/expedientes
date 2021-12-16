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
        // Permission::create(['name' => 'list documentos']);
        // Permission::create(['name' => 'view documentos']);
        // Permission::create(['name' => 'create documentos']);
        // Permission::create(['name' => 'update documentos']);
        // Permission::create(['name' => 'delete documentos']);

        // Permission::create(['name' => 'list expedientes']);
        // Permission::create(['name' => 'view expedientes']);
        // Permission::create(['name' => 'create expedientes']);
        // Permission::create(['name' => 'update expedientes']);
        // Permission::create(['name' => 'delete expedientes']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'usuario']);
        $userRole->givePermissionTo($currentPermissions);
        Role::create(['name'=>'capturista']);
        // Create admin exclusive permissions
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

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'administrador']);
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
