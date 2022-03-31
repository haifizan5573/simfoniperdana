<?php

namespace App\Http\Livewire\API;

use Livewire\Component;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class UserData extends Component
{


    public function listagent(Request $request){

        
        $data = [];

        if($request->has('q')){
            $search = $request->q;
            $datas =User::where('name','like','%'.$search.'%')
                    ->where('isactive',1)
            		->get();
       }else{

            $datas =User::orderby('id','asc')
            ->where('isactive',1)->get();

       }


       foreach($datas as $user){
            $role=$user->roles()->first()->name;
            if($role=='Agent'){
                $data[]=array("id"=>$user->id,"name"=>$user->name);
            }
           
       }

       return response()->json($data);


    }

    public function rolelist(Request $request){

        
        $data = [];
        $type=$request->type;
        if($request->has('q')){
            $search = $request->q;
            $datas =Role::where('name','like','%'.$search.'%')
                    ->when($type==1,function($q){
                        $q->where('name','!=','Sub-Agent');
                    })
            		->get();
       }else{

            $datas =Role::orderby('id','asc')
                    ->when($type==1,function($q){
                        $q->where('name','!=','Sub-Agent');
                    })
                    ->get();

       }


       foreach($datas as $role){
            
                $data[]=array("id"=>$role->id,"name"=>$role->name);
            
           
       }

       return response()->json($data);


    }

}


?>