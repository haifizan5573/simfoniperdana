<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class AddMenu extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $groups = [
            array('KOBETA CIMB',1,2,0),
            array('KOBETA BANK RAKYAT',2,2,0),
            array('AFFIN BANK',3,2,0),
            array('Application List',1,2,1),
            array('Add Application',2,2,1),
            array('Application List',1,2,2),
            array('Add Application',2,2,2),
            array('Application List',1,2,3),
            array('Add Application',2,2,3),
         ];
      
         foreach ($groups as $group) {
              Menu::create(['name' => $group[0],'order'=>$group[1],'group_id'=>$group[2],'parent'=>$group[3]]);
         }
    }
}
