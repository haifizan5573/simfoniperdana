<?php

namespace App\Http\Livewire\API;

use Livewire\Component;
use App\Models\ProductGroup;
use App\Models\Product;
use Illuminate\Http\Request;

class Loan extends Component
{


    public function list(Request $request){

        
        $data = [];

        if($request->has('q')){
            $search = $request->q;
            $datas =ProductGroup::where('name','like','%'.$search.'%')
                    ->where('isactive',1)
            		->get();
       }else{

            $datas =ProductGroup::orderby('id','asc')
            ->where('isactive',1)->get();

       }


       foreach($datas as $productgroup){
      
            $data[]=array("id"=>$productgroup->id,"name"=>$productgroup->name);
       }

       return response()->json($data);


    }

    public function productname(Request $request){

        
        $data = [];
        $group=$request->id;
        if($request->has('q')){
            $search = $request->q;
            $datas =Product::where('name','like','%'.$search.'%')
                    ->where('groupid',$group)
            		->get();
       }else{

            $datas =Product::orderby('id','asc')
            ->where('groupid',$group)->get();

       }


       foreach($datas as $product){
      
            $data[]=array("id"=>$product->id,"name"=>$product->name);
       }

       return response()->json($data);


    }

    public function tenure(){

        $data=[];

          for($i=1;$i<=15;$i++){
            $data[]=array("id"=>$i,"name"=>"$i Year(s)");
          }

          return response()->json($data);
    }


}


?>