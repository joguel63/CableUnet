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
       $role_1=Role::create(['name'=>'admin']);
       $role_2=Role::create(['name'=>'subscriptor']);

       Permission::create(['name'=>'admin.home'])->syncRoles([$role_1,$role_2]);

       Permission::create(['name'=>'admin.contratos.index'])->assignRole($role_1);
       Permission::create(['name'=>'admin.contratos.show'])->syncRoles([$role_1,$role_2]);
       Permission::create(['name'=>'admin.contratos.edit'])->assignRole($role_1);
       Permission::create(['name'=>'admin.contratos.create'])->syncRoles([$role_1,$role_2]);
       Permission::create(['name'=>'admin.contratos.destroy'])->assignRole($role_1);

       Permission::create(['name'=>'admin.requests.index'])->assignRole($role_1);
       Permission::create(['name'=>'admin.requests.edit'])->assignRole($role_1);
       Permission::create(['name'=>'admin.requests.create'])->syncRoles([$role_1,$role_2]);
       Permission::create(['name'=>'admin.requests.destroy'])->assignRole($role_1);

       Permission::create(['name'=>'admin.users.index'])->assignRole($role_1);
       Permission::create(['name'=>'admin.users.update'])->assignRole($role_1);
       Permission::create(['name'=>'admin.users.edit'])->assignRole($role_1);

       Permission::create(['name'=>'admin.servicios.index'])->assignRole($role_1);
       Permission::create(['name'=>'admin.servicios.create'])->assignRole($role_1);
       Permission::create(['name'=>'admin.servicios.edit'])->assignRole($role_1);
       Permission::create(['name'=>'admin.servicios.destroy'])->assignRole($role_1);

       Permission::create(['name'=>'admin.plans.index'])->assignRole($role_1);
       Permission::create(['name'=>'admin.plans.create'])->assignRole($role_1);
       Permission::create(['name'=>'admin.plans.edit'])->assignRole($role_1);
       Permission::create(['name'=>'admin.plans.destroy'])->assignRole($role_1);

       Permission::create(['name'=>'admin.channels.index'])->assignRole($role_1);
       Permission::create(['name'=>'admin.channels.create'])->assignRole($role_1);
       Permission::create(['name'=>'admin.channels.edit'])->assignRole($role_1);
       Permission::create(['name'=>'admin.channels.destroy'])->assignRole($role_1);

       Permission::create(['name'=>'admin.programas.index'])->assignRole($role_1);
       Permission::create(['name'=>'admin.programas.create'])->assignRole($role_1);
       Permission::create(['name'=>'admin.programas.edit'])->assignRole($role_1);
       Permission::create(['name'=>'admin.programas.destroy'])->assignRole($role_1);

       Permission::create(['name'=>'admin.paquetes.index'])->assignRole($role_1);
       Permission::create(['name'=>'admin.paquetes.create'])->assignRole($role_1);
       Permission::create(['name'=>'admin.paquetes.edit'])->assignRole($role_1);
       Permission::create(['name'=>'admin.paquetes.destroy'])->assignRole($role_1);

       Permission::create(['name'=>'admin.horarios.index'])->assignRole($role_1);
       Permission::create(['name'=>'admin.horarios.create'])->assignRole($role_1);
       Permission::create(['name'=>'admin.horarios.edit'])->assignRole($role_1);
       Permission::create(['name'=>'admin.horarios.destroy'])->assignRole($role_1);

       

    }
}
