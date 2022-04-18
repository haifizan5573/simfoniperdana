<?php

namespace App\Http\Livewire\Surau;

use Livewire\Component;
use App\Models\Label;

class CategoryList extends Component
{
    public $filter,$search,$status,$name,$appid,$statusplaceholder,$description;

    protected $rules=[
        'name' => 'required|min:4',
    ];

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

    public function open($pagemodal,$title,$dataid)
    {
        $this->pagemodal = $pagemodal;
        $this->title = $title;   
        
        if(!empty($dataid)){
            $categorydata=Label::find($dataid);
            $this->name=$categorydata->name;
            $this->appid=$dataid;
            $this->description=$categorydata->description;
            $this->status=$categorydata->isactive;
            $this->statusplaceholder=Label::find($this->status)->first()->name;
        }else{
            $this->name="";
            $this->status="";
            $this->statusplaceholder="";
        }

       
      
        $this->emit('modal',[$this->pagemodal,$this->title,$this->statusplaceholder,$this->description]);
    }

    public function editcategory(){

        $this->validate();

        $categorydata=Label::find($this->appid);

        $categorydata->update([
            'name'=>$this->name,
            'description'=>$this->description,
            'isactive'=>$this->status
        ]);

        $this->message=array("message"=>"Category Updated","alert-type"=>"success");
   

        $this->emit('showmessage',[$this->message]);
        $this->emit('closemodal');
        $this->mount(); 
    }

    public function addcategory(){

        $this->validate();

        Label::create([
            'name'=>$this->name,
            'description'=>$this->description,
            'type'=>'category_surau'
        ]);

        $this->message=array("message"=>"New Category Added","alert-type"=>"success");
   

        $this->emit('showmessage',[$this->message]);
        $this->emit('closemodal');
        $this->mount(); 
    }
}
