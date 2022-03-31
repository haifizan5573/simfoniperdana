<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\ProductGroup;
use App\Models\Menu;
class AddProductGroup extends Component
{
    protected $rules=[
        'name' => 'required|min:4',
    ];

    //|exists:product_groups,name
    public $name;

    public function render()
    {
        return view('livewire.product.add-product-group');
    }

    public function addproductgroup(){

        $this->validate();

       

           //add menu
        $menu=Menu::create([
            'name'=>$this->name,
            'parent'=>0,
            'group_id'=>2,
            'urlid'=>'',
            'icon'=>'dripicons-blog',
            'permission'=>'app-list'

        ]);

        ProductGroup::create([
            'name'=>$this->name,
            'menuid'=>$menu->id
        ]);

        $this->message=array("message"=>"New Product Group Added","alert-type"=>"success");

        return redirect()->route('product')->with($this->message);
    }
}
