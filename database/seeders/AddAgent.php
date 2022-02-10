<?php

namespace Database\Seeders;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Database\Seeder;

class AddAgent extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $user = User::create([
            'name' => 'Agent 4', 
            'email' => 'agent4@gmail.com',
            'password' => bcrypt('zyxwvut780')
        ]);
    
        $role = Role::where('name','Agent')->first();
        $user->assignRole([$role->id]);
    }
}
