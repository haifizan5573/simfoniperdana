<?php

namespace App\Http\Livewire\Loan;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Loan;
use Illuminate\Support\Facades\Auth;
use Purifier;

class ViewApplication extends Component
{
    public $appid,$loan,$customer,$contact,$address,$payslip,$remark;
    public $buttcustdetails,$buttdocument,$butthistory;

    public function mount(Request $request){

        $this->buttcustdetails=true;
        $this->buttdocument=false;
        $this->butthistory=false;
        $this->appid=$request->id;
   
       

        
       $this->loan=Loan::find($request->id);
       if(isset($this->loan->id)){
        $this->customer=$this->loan->Customer()->first();
        $this->contact=$this->customer->Contacts()->first();
        $this->address=$this->customer->Addresses()->first();
       }else{
           abort(404);
       }

    }
    
    public function render()
    {
      
        return view('livewire.loan.view-application');
    }

    public function addremark(){

        $loan = Loan::find($this->appid);
        $cleanremark = Purifier::clean($this->remark);
        $remark = $loan->remarks()->create([
            'remark' => $cleanremark,
            'remark_by' => Auth::user()->id
        ]);

        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'info',  'message' => 'New comment added']
        );

        $this->emit('cleartext');

    }

    public function togglebutton($button){

        $this->buttcustdetails=false;
        $this->buttdocument=false;
        $this->butthistory=false;

        $this->$button=true;

    }
}
