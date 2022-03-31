<?php

namespace App\Http\Livewire\API;

use Livewire\Component;
use App\Models\User;
use App\Models\Label;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class SystemData extends Component
{


    public function status(Request $request){

        
        $data = [];
        $type=$request->type;
        if($request->has('q')){
            $search = $request->q;
            $datas =Label::where('name','like','%'.$search.'%')
                    ->when(!empty($type),function($q) use ($type){
                        $q->where('type',$type);
                    })
                    ->where('isactive',1)
            		->get();
       }else{

            $datas =Label::orderby('id','asc')
            ->when(!empty($type),function($q) use ($type){
                $q->where('type',$type);
            })
            ->where('isactive',1)->get();

       }


       foreach($datas as $label){
      
            $data[]=array("id"=>$label->id,"name"=>$label->name);
       }

       return response()->json($data);


    }

}


?>