<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Start by clearing the Spatie permissions cache
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Creating all permissions
        Permission::create(['name' => 'panel access']);
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'manage roles']);

        // Creating "Owner" role
        $role = Role::create(['name' => 'owner']);
        $role->givePermissionTo(Permission::all());
    }
}
