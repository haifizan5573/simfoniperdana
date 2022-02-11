<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AddRolePermissionAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //add new permission
        $permissions = [
            'app-list',
            'app-create',
            'app-edit',
            'app-delete',
            'app-assign',
            'admin',
            'public',
         ];
       

         //sync to role
        $role = Role::where('name','Admin')->first();
     
        $perms= Permission::whereIn('name',$permissions)->pluck('id','id')->ToArray();
        //dd($perms);
        $role->syncPermissions($perms);
    }
}
