<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'blogger']);

        Permission::create(['name' => 'admin.home',
                            'description' =>'Ver el dashboard'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'admin.users.index',
                            'description' =>'ver listado de usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit',
                            'description' =>'Asignar un rol'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.categories.index',
                            'description' =>'Ver listado de categorias'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.categories.create',
                            'description' =>'Crear una nueva categoria'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.edit',
                            'description' =>'Editar una categoria'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.destroy',
                            'description' =>'Eliminar una categoria'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.cursos.index',
                            'description' =>'Ver listado de cursos'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.cursos.create',
                            'description' =>'Crear un curso nuevo'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.cursos.edit',
                            'description' =>'Editar curso'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.cursos.destroy',
                            'description' =>'Eliminar curso'])->syncRoles([$role1,$role2]);
                            
        Permission::create(['name' => 'admin.roles.index',
                            'description' =>'Ver listado de Rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.create',
                            'description' =>'Crear un nuevo rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.edit',
                            'description' =>'Editar rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.destroy',
                            'description' =>'Eliminar rol'])->syncRoles([$role1]);

        
    }
}
