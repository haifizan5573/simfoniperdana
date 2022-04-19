<?php

namespace App\Http\Livewire\Surau;

use Livewire\Component;
use App\Models\Form;
use App\Helpers\Formatter;

class FormList extends Component
{
    public $appstatus,$status,$formid,$curpage;
    public function mount(){

        $forms=Form::paginate(30);

    }

    public function render()
    {
        $this->curpage="forms";

        return view('livewire.surau.form-list',[
            'forms'=>Form::paginate(30),
            'formatter'=>new Formatter,
        ]);
    }

    public function open($pagemodal,$title,$dataid)
    {
        $this->pagemodal = $pagemodal;
        $this->title = $title;
        $this->dataid = $dataid;
        $this->formdata = Form::find($dataid);
        $this->appstatus = $this->formdata->label()->first()->name;
        
        $this->emit('modal',[$pagemodal,$title,$dataid,$this->appstatus]);
    }

    public function editstatus(){

        // dd($this->status);
 
         if(!empty($this->status)){
             $formu=Form::find($this->dataid)->first();
 
             $formu->update(['status'=>$this->status]);
     
             $this->message=array("message"=>"Form status updated","alert-type"=>"success");
         }else{
             $this->message=array("message"=>"Oppss!! error occured. Please try again later","alert-type"=>"error");
         }
 
 
         $this->emit('showmessage',[$this->message]);
         $this->emit('closemodal');
         $this->mount($this->formid); 
 
     }
}
