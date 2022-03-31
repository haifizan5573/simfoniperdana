<?php

namespace App\Http\Livewire\Product;
use App\Models\Product;
use App\Models\ProductRate;
use App\Models\ProductGroup;
use App\Models\Menu;

use Livewire\Component;

class EditProduct extends Component
{

    public $keyrate=3,$name,$minloan,$maxloan,$maxtenure,$rate=array();

    protected $rules = [
        'name' => 'required|min:4',
    ];


    public function mount($id){
      $this->pid=$id;
    
      $this->product=Product::find($this->pid);
      $this->name=$this->product->name;
      $this->minloan=$this->product->minloan;
      $this->maxloan=$this->product->maxloan;
      $this->maxtenure=$this->product->maxtenure;
    }


    public function render()
    {
        return view('livewire.product.edit-product');
    }

    public function addrate(){
        $this->keyrate++;
    }

    public function deleterate(){
        $this->keyrate--;
    }

    public function editproduct(){

        $this->validate();

        $menuid=ProductGroup::where('id',$this->pid)->first()->toArray();

       // dd($menuid['menuid']);

        $product=Product::create([
            'name'=>$this->name,
            'minloan'=>$this->minloan,
            'maxloan'=>$this->maxloan,
            'maxtenure'=>$this->maxtenure,
            'groupid'=>$this->pid
        ]);

        for($i=0;$i<$this->keyrate;$i++){
            if(!empty($this->rate[$i])){
                ProductRate::create([
                    'rates'=>$this->rate[$i],
                    'productid'=>$product->id,
                
                ]);
             }
        }
       
        //add menu
        Menu::create([
            'name'=>$this->name,
            'parent'=>$menuid['menuid'],
            'group_id'=>2,
            'routename'=>'applist',
            'urlid'=>$product->id,
            'permission'=>'app-list'

        ]);
        $this->message=array("message"=>"New Product created","alert-type"=>"success");

        return redirect()->route('product')->with($this->message);

    }
}
