<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuGroup;

class AddMenuGroup extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = [
            array('Administration',10),
            array('Loan Management',0),
         ];
      
         foreach ($groups as $group) {
              MenuGroup::create(['name' => $group[0],'order'=>$group[1]]);
         }
    }
}
