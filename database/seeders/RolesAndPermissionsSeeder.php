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
        Permission::create(['name' => 'manage products']);
        Permission::create(['name' => 'view products']);
        Permission::create(['name' => 'manage orders']);
        Permission::create(['name' => 'view orders']);
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'view users']);

        // Create roles and assign created permissions
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all());

        $bodegaRole = Role::create(['name' => 'bodega']);
        $bodegaRole->givePermissionTo(['manage products', 'view products']);

        $ventasRole = Role::create(['name' => 'ventas']);
        $ventasRole->givePermissionTo(['view products', 'manage orders', 'view orders']);

        $contadorRole = Role::create(['name' => 'contador']);
        $contadorRole->givePermissionTo(['view orders']);
    }
}
