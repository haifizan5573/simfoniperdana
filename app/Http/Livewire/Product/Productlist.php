<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\ProductGroup;
use Session;

class Productlist extends Component
{
    public function render()
    {
        $message=Session::get('message');
        $alerttype=Session::get('alert-type');
        $toastrdata=array("message"=>$message,"alert-type"=>$alerttype);

        return view('livewire.product.productlist',[
            'productgroups'=>ProductGroup::paginate(30),
            'toastrdata'=>$toastrdata
        ]);
    }
}
