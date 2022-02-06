<?php

namespace Database\Seeders;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Database\Seeder;

class AddUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Staff One', 
            'email' => 'staff@gmail.com',
            'password' => bcrypt('zyxwvut780')
        ]);
    
        $role = Role::where('name','Staff')->first();
     
        //$permissions = Permission::pluck('id','id')->all();
   
        //$role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
    }
}
