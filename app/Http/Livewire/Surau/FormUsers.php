<?php

namespace App\Http\Livewire\Surau;

use Livewire\Component;
use App\Models\FormUser;
use App\Models\Form;
use App\Models\FileUpload;
use Livewire\WithPagination;

class FormUsers extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function mount($formid){

        $this->formid=$formid;
        $form=Form::find($this->formid);

        $this->title=$form->title;
    }

    public function render()
    {
        return view('livewire.surau.form-user',[
            'formuser'=>FormUser::where('formid',$this->formid)->paginate(30)
        ]);
    }

    public function open($pagemodal,$title,$dataid)
    {
        $this->pagemodal = $pagemodal;
        $this->title = $title;
        $this->dataid = $dataid;
        $this->data=FileUpload::where('file_uploadsable_id',$dataid)->first();
        $this->appstatus="";
        if($pagemodal=="livewire.form.updatestatus"){
            $this->formdata=FormUser::where('userid',$dataid)->first();
            $this->appstatus=$this->formdata->label()->first()->name;
            $this->status=$this->formdata->status;
            $this->userid=$dataid;
        }
        
        $this->emit('modal',[$pagemodal,$title,$dataid,$this->appstatus]);
    }

    public function editstatus(){

       // dd($this->status);

        if(!empty($this->status)){
            $formuser=FormUser::where('userid',$this->userid)->first();

            $formuser->update(['status'=>$this->status]);
    
            $this->message=array("message"=>"Payment status updated","alert-type"=>"success");
        }else{
            $this->message=array("message"=>"Oppss!! error occured. Please try again later","alert-type"=>"error");
        }


        $this->emit('showmessage',[$this->message]);
        $this->emit('closemodal');
        $this->mount($this->formid); 

    }
}
