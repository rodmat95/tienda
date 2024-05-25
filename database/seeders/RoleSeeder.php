<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Empleado']);
        $role3 = Role::create(['name' => 'Vendedor']);

        Permission::create([
            'name' => 'admin.home',
            'description' => 'Ver el Dashboard'
        ])->syncRoles([$role1, $role2, $role3]);

        // Administrador:
        Permission::create([
            'name' => 'admin.users.index',
            'description' => 'Gestionar Usuarios'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.users.edit',
            'description' => 'Editar Usuarios'
        ])->syncRoles([$role1]);

        Permission::create([
            'name' => 'admin.roles.index',
            'description' => 'Gestionar Puestos'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.roles.create',
            'description' => 'Crear Puestos'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.roles.edit',
            'description' => 'Editar Puestos'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.roles.destroy',
            'description' => 'Cambiar estado de los Puestos'
        ])->syncRoles([$role1]);

        // Gestión:
        Permission::create([
            'name' => 'admin.categories.index',
            'description' => 'Gestionar Categorías'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.categories.create',
            'description' => 'Crear Categorías'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.categories.edit',
            'description' => 'Editar Categorías'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.categories.destroy',
            'description' => 'Cambiar estado de las Categorías'
        ])->syncRoles([$role1, $role2]);

        Permission::create([
            'name' => 'admin.products.index',
            'description' => 'Gestionar Productos'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.products.create',
            'description' => 'Crear Productos'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.products.edit',
            'description' => 'Editar Productos'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.products.destroy',
            'description' => 'Cambiar estado de los Productos'
        ])->syncRoles([$role1, $role2]);

        Permission::create([
            'name' => 'admin.commissions.index',
            'description' => 'Gestionar Comisiones'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.commissions.create',
            'description' => 'Crear Comisiones'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.commissions.edit',
            'description' => 'Editar Comisiones'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.commissions.destroy',
            'description' => 'Cambiar estado de las Comisiones'
        ])->syncRoles([$role1, $role2]);

        Permission::create([
            'name' => 'admin.suppliers.index',
            'description' => 'Gestionar Vendedores'
        ])->syncRoles([$role1, $role2]);
        /* Permission::create([
            'name' => 'admin.suppliers.create',
            'description' => 'Crear Vendedores'
        ]); */
        Permission::create([
            'name' => 'admin.suppliers.edit',
            'description' => 'Editar Vendedores'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.suppliers.destroy',
            'description' => 'Cambiar estado de los Vendedores'
        ])->syncRoles([$role1, $role2]);

        // Opciones de Productos:
        Permission::create([
            'name' => 'admin.distributions.index',
            'description' => 'Gestionar Distribuciones'
        ])->syncRoles([$role1, $role3]);
        Permission::create([
            'name' => 'admin.distributions.create',
            'description' => 'Crear Distribuciones'
        ])->syncRoles([$role1, $role3]);
        Permission::create([
            'name' => 'admin.distributions.edit',
            'description' => 'Editar Distribuciones'
        ])->syncRoles([$role1, $role3]);
        Permission::create([
            'name' => 'admin.distributions.destroy',
            'description' => 'Cambiar estado de las Distribuciones'
        ])->syncRoles([$role1, $role3]);
    }
}