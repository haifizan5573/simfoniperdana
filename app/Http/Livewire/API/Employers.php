<?php

namespace App\Http\Livewire\API;

use Livewire\Component;
use App\Models\Employer;
use Illuminate\Http\Request;

class Employers extends Component
{



    public function list(Request $request){

        
        $data = [];

        if($request->has('q')){
            $search = $request->q;
            $datas =Employer::where('name','like','%'.$search.'%')
                    ->where('isactive','Active')
            		->get();
       }else{

            $datas =Employer::orderby('id','asc')
            ->take(1000)
            ->where('isactive','Active')->get();

       }


       foreach($datas as $employer){
      
            $data[]=array("id"=>$employer->id,"name"=>$employer->name);
       }

       return response()->json($data);


    }


}


?>