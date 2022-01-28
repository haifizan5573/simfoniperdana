<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;

use Illuminate\Database\Seeder;

class AddRole extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'Admin',
            'Agent',
            'Sub-Agent',
            'Staff',
         ];
         foreach ($permissions as $permission) {
        
            Role::create(['name' => $permission]);
         
         }
    }
}
