<?php

namespace App\Http\Livewire\API;

use Livewire\Component;
use App\Models\User;
use App\Models\Label;
use App\Models\Team;
use App\Models\ResidentPosition;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class SystemData extends Component
{


    public function residentposition(Request $request){

        $type=$request->type;
        $position=array();

        $datas=ResidentPosition::where('type',$type)
                    ->where('isactive',1)
            		->get();

        foreach($datas as $data){
            $position[]=array("id"=>$data->id,"name"=>$data->name);
        }
            
        return response()->json($position);
            
        
    }
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

            $datas =Label::orderby('order','asc')
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

    public function streetlist($type=0){

        $data=array();
        $street=6;
        
        for($i=1;$i<=6;$i++){
            $data[]=array("id"=>"Simfoni $i","name"=>"Simfoni $i");
        }

        if($type==1){
            return $data;
        }else{
            return response()->json($data);
        }
    }

    public function numberlist($number){

        $data=array();
        
        
        for($i=1;$i<=$number;$i++){
            $data[]=array("id"=>$i,"name"=>$i);
        }
       
            return response()->json($data);
        
    }

    public function teams($type,$returntype=0){

       $teams=Team::with('Type')->whereHas('Type',function($q) use ($type){ $q->where('type',$type); })->get();

       foreach($teams as $team){
      
        $data[]=array("id"=>$team->id,"name"=>$team->title);
        }

        if($returntype==1){
            return $data;
        }
        else if($returntype==2){
            return $teams;
        }
        else{
            return response()->json($data);
        }
    }

}


?>