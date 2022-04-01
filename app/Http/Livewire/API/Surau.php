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

}


?>