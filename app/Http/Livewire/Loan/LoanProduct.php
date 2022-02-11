<?php

namespace App\Http\Livewire\Loan;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Http\Request;

class LoanProduct extends Component
{
    public function render(Request $request)
    {
        return view('livewire.loan.product');
    }

    public function list(Request $request){

        $data = [];

        if($request->has('q')){
            $search = $request->q;
            $datas =Product::select("id","name","groupid")
            		->where('name','LIKE',"%$search%")
                    ->where('status','1')
                    ->orderby('groupid','asc')
            		->get();
       }else{

            $datas =Product::select("id","name","groupid")
            ->where('status','1')
            ->orderby('groupid','asc')
            ->get();

       }

       foreach($datas as $product){
            $addtext=(isset($product->ProductGroup->name))?" in ".$product->ProductGroup->name:"";
            $data[]=array("id"=>$product->id,"name"=>$product->name.$addtext);
       }

       return response()->json($data);

    }
}
