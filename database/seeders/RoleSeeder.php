<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role1 = Role::create(['name' => 'Admin',
      'description' => 'Administrador del Sistema'
      ]) ; //
      
      $role2 = Role::create(['name' => 'Cliente',
      'description' => 'Administrador del Sistema']) ; //
      
        // Permission::create(['name' => 'admin.accesorios.index']);
        // Permission::create(['name' => 'admin.accesorios.edit']);
        // Permission::create(['name' => 'admin.accesorios.destroy']);
        // Permission::create(['name' => 'admin.accesorios.create']);
    
    }
}
