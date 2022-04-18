<?php

namespace App\Http\Livewire\Surau;

use Livewire\Component;
use App\Models\Label;

class CategoryList extends Component
{
    public $filter,$search,$status;

    public function render()
    {

        $categories=Label::when(!empty($this->search),function($q){
                
            $q->where('name','like','%'.$this->search.'%');
          
            
        })
        ->where('type','category_surau')
        ->orderby('created_at','desc')
        ->paginate(30);

        return view('livewire.surau.category',[
            'categories'=>$categories
        ]);
    }

    public function open($pagemodal,$title)
    {
        $this->pagemodal = $pagemodal;
        $this->title = $title;          
        $this->emit('modal',[$this->pagemodal,$this->title]);
    }
}
