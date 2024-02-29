<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleAndPermissionSeeder extends Seeder
{
    public function run()
    {
        $permissionsCustomer = [
            'products.index',
            'products.show',
            'products.store',
            'products.edit',
            'products.update',
            'products.destroy',
            'categories.index',
            'categories.get-all',
            'categories.create',
            'categories.store',
            'categories.edit',
            'categories.update',
            'categories.destroy',
        ];
        $permissionsAdmin = array_merge([
            'users.index',
            'users.create',
            'users.store',
            'users.edit',
            'users.update',
            'users.destroy',
        ], $permissionsCustomer);

        //Roles
        $admin = Role::create(['name' => 'admin']);
        $customer = Role::create(['name' => 'user']);

        foreach ($permissionsAdmin as $permission){
            $permission = Permission::create(['name'=> $permission]);
            $admin->givePermissionTo($permission);
        }
        foreach ($permissionsCustomer as $permission){
            $permission = Permission::where(['name'=> $permission])->first();
            $customer->givePermissionTo($permission);
        }
    }
}
