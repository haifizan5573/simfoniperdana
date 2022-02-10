<?php

namespace App\Http\Livewire\Loan;

use Livewire\Component;
use App\Models\Product;

class LoanProduct extends Component
{
    public function render()
    {
        return view('livewire.loan.product');
    }

    public function list(){

        $data = [];

        //if($request->has('q')){
           // $search = $request->q;
            $data =Product::select("id","name")
            		//->where('name','LIKE',"%$search%")
                    //->where('status','Active')
            		->get();
       // }
        return response()->json($data);

    }
}
