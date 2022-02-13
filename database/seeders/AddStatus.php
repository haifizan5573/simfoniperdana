<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class AddStatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $statuses = [
            array('New','#1E81B0'),
            array('Pending','#F9e8b3'),
            array('Approved','#D2F9B3'),
            array('Disbursed','#70E315'),
            array('Rejected','#E34415'),
         ];
         foreach ($statuses as $status) {
        
            Status::create(['name' => $status[0],'color'=>$status[1]]);
         
         }

    }
}
