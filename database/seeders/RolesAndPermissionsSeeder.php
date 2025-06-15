<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        Permission::create(['name' => 'create-post']);
        Permission::create(['name' => 'edit-post']);
        Permission::create(['name' => 'delete-post']);
        Permission::create(['name' => 'publish-post']);
        Permission::create(['name' => 'view-dashboard']);
        Permission::create(['name' => 'manage-users']); // For admin role

        // Create roles and assign existing permissions
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all()); // Admin gets all permissions

        $editorRole = Role::create(['name' => 'editor']);
        $editorRole->givePermissionTo('create-post');
        $editorRole->givePermissionTo('edit-post');
        $editorRole->givePermissionTo('publish-post');
        $editorRole->givePermissionTo('view-dashboard');

        $viewerRole = Role::create(['name' => 'viewer']);
        $viewerRole->givePermissionTo('view-dashboard');

        // Assign a role to a user (example)
        $user = \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);
        $user->assignRole('admin');

        $user = \App\Models\User::factory()->create([
            'name' => 'Editor User',
            'email' => 'editor@example.com',
            'password' => bcrypt('password'),
        ]);
        $user->assignRole('editor');
    }
}