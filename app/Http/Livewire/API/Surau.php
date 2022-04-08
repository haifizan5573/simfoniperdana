<?php

namespace App\Http\Livewire\API;

use Livewire\Component;
use App\Models\User;
use App\Models\Label;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class Surau extends Component
{


 

    public function numberlist($number){

        $data=array();
        
        
        for($i=1;$i<=$number;$i++){
            $data[]=array("id"=>$i,"name"=>$i);
        }

        return response()->json($data);
    }

    public function groupActivity($datefrom,$dateend,$type){

        $period = CarbonPeriod::create('2018-06-14', '2018-06-20');

            // Iterate over the period
            foreach ($period as $date) {
                echo $date->format('Y-m-d');
            }

    }

}


?>