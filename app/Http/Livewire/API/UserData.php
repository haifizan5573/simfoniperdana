<?php

namespace App\Http\Livewire\API;

use Livewire\Component;
use App\Models\User;
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

}


?>