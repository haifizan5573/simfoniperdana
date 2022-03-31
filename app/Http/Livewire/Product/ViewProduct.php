<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductGroup;

class ViewProduct extends Component
{
    public function mount($id){

        $this->groupid=$id;
        $this->group=ProductGroup::find($this->groupid);
        $this->productgroup=$this->group->name;
    }
    public function render()
    {
        return view('livewire.product.view-product',[
            'products'=>Product::where('groupid',$this->groupid)->get()
        ]);
    }
}
