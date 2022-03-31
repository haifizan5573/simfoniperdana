<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\ProductGroup;
use App\Models\Menu;

class EditProductGroup extends Component
{
    public $name,$status,$statusname,$productgroup,$menuid;

    protected $rules = [
        'name' => 'required|min:4',
        'status'=>'required',
    ];


    public function mount($id){

        $this->pid=$id;
        $this->productgroup=ProductGroup::find($this->pid);
        $this->name=$this->productgroup->name;
        $this->statusname=$this->productgroup->Status()->first()->name;
        $this->status=$this->productgroup->isactive;
        $this->menuid=$this->productgroup->menuid;

    }
    public function render()
    {
        
        return view('livewire.product.edit-product-group');
    }

    public function editproductgroup(){

        $this->validate();
        //dd($this->menuid);
        //$this->productgroup=ProductGroup::find($this->pid);
        $this->productgroup->update([
            'name'=>$this->name,
            'isactive'=>$this->status
        ]);

        $menu=Menu::find($this->menuid);
        $menu->update([
            'name'=>$this->name,
        ]);

        $this->message=array("message"=>"Product Group Updated","alert-type"=>"success");

        return redirect()->route('product')->with($this->message);
    }
}
