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

        $permissions = [
            'create threads',
            'panel access',
            'manage users',
            'manage roles',
            'manage forum categories',
        ];     

        foreach ($permissions as $permission) {
            Permission::findOrCreate($permission);
        }

        // Creating "Owner" role
        $role = Role::firstOrCreate(['name' => 'owner']);
        $role->givePermissionTo(Permission::all());
    }
}
