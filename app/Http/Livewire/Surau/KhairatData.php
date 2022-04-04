<?php

namespace App\Http\Livewire\Surau;

use Livewire\Component;
use App\Models\Khairat;
use App\Models\FileUpload;
use App\Models\KhairatUser;
use Livewire\WithPagination;
use Auth;
use Session;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class KhairatData extends Component
{
   // use WithPagination;
    use AuthorizesRequests;

    public $filter,$roles,$search,$status;
    protected $paginationTheme = 'bootstrap';


    public function mount(){

        $this->filter=(empty($this->filter))?date('Y'):$this->filter;
        $this->roles=Auth::user()->roles()->pluck('name')->ToArray();

      
    }

    public function render()
    {
        $message=Session::get('message');
        $alerttype=Session::get('alert-type');
        $toastrdata=array("message"=>$message,"alert-type"=>$alerttype);
        
     
        
        $break=0;
        if(in_array('Admin',$this->roles)||in_array('Surau Committee',$this->roles)){
              // dd($this->filter);
              $khairatdata=KhairatUser::whereHas('khairat', function($q){
                       $q->where('year', '=',$this->filter);
                       })
                       ->when(!empty($this->search),function($q){
                            $q->whereHas('user',function($u){
                               $u->where('name','like','%'.$this->search.'%');
                            });
                       })
                       ->paginate(30);
            $break=1;
         }
  
        
  
        if(in_array('Owner',$this->roles)&&$break==0){

            $khairatdata=KhairatUser::where('userid',Auth::user()->id)
                ->paginate(30);

        }

        return view('livewire.surau.khairat-data',[
            'khairats'=>$khairatdata,
            'toastrdata'=>$toastrdata
        ]);
    }

    

    public function open($page,$title,$dataid)
    {
        $this->page = $page;
        $this->title = $title;
        $this->dataid = $dataid;
        $this->data=FileUpload::where('file_uploadsable_id',$dataid)->first();
        $this->appstatus="";
        if($page=="livewire.form.updatestatus"){
            $this->khairatuser=KhairatUser::where('userid',$dataid)->first();
            $this->appstatus=$this->khairatuser->label()->first()->name;
            $this->status=$this->khairatuser->status;
            $this->userid=$dataid;
        }
        
        $this->emit('modal',[$page,$title,$dataid,$this->appstatus]);
    }

    public function editstatus(){

       // dd($this->status);

        if(!empty($this->status)){
            $khairatuser=KhairatUser::where('userid',$this->userid)->first();

            $khairatuser->update(['status'=>$this->status]);
    
            $this->message=array("message"=>"Payment status updated","alert-type"=>"success");
        }else{
            $this->message=array("message"=>"Oppss!! error occured. Please try again later","alert-type"=>"error");
        }


        $this->emit('showmessage',[$this->message]);
        $this->emit('closemodal');
        $this->mount(); 

    }
}
