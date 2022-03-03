<?php

namespace App\Http\Livewire\API;

use Livewire\Component;
use App\Models\PostCode;
use Illuminate\Http\Request;

class Address extends Component
{
    
    public function postcode(Request $request){

        
        $data = [];

        if($request->has('q')){
            $search = $request->q;
            $datas =PostCode::where('postcode','like','%'.$search.'%')
                    ->orwhere('district','like','%'.$search.'%')
                    ->groupBy('postcode')
            		->get();
       }else{

            $datas =PostCode::orderby('id','asc')
            ->take(100)
            ->groupBy('postcode')->get();

       }


       foreach($datas as $postcode){
      
            $data[]=array("id"=>$postcode->postcode,"name"=>$postcode->postcode." - ".$postcode->district);
       }

       return response()->json($data);


    }

    public function location(Request $request){

        
        $data = [];

 
            
            $search = $request->id;
           
            if($request->has('q')){
                $loc=$request->q;
                $datas =PostCode::where('location','like','%'.$loc.'%')
                        ->where('postcode',$search)
            		    ->get();
      

            }else{
                $datas =PostCode::where('postcode',$search)
            		    ->get();
      
            }
        
       foreach($datas as $location){
      
            $data[]=array("id"=>$location->id,"name"=>$location->location);
       }

       return response()->json($data);


    }

}
