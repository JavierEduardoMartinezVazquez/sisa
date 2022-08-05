<?php

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
        $role1 = Role::create(['name'=>'Admin']);
        $role2 = Role::create(['name'=>'Usuar']);

        Permission::create(['name' => 'home'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'User'])->assignRole($role1);
        Permission::create(['name' => 'Business'])->assignRole($role1);
        Permission::create(['name' => 'Hourhand'])->assignRole($role1);
        Permission::create(['name' => 'Hourhandreporte'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'Holidays'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'Permi'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'Vacationdays'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'Vacationreports'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'Permissionsreports'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'Exits'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'Nominas'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'Assistances'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'Assistancesreports'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'Businessreporte'])->syncRoles([$role1,$role2]);
    }
}
