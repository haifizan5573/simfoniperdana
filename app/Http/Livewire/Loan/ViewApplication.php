<?php

namespace App\Http\Livewire\Loan;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Loan;
use App\Models\Customer;
use App\Models\Contact;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Purifier;

class ViewApplication extends Component
{
    public $appid,$loan,$customer,$contact,$address,$payslip,$remark;
    public $buttcustdetails,$buttdocument,$butthistory,$message;
    public $custid,$name,$phone,$email,$postcode,$location,$fulladdress;
    
    public $isOpen = false;
    public $page = "";
    public $dataid = "";
    public $title = "";

    protected $listeners = ['showModal' => 'open', 'closeModal' => 'close'];

    public function open($page,$title,$dataid)
    {
        $this->isOpen = true;
        $this->page = $page;
        $this->title = $title;
        $this->dataid = $dataid;
        $this->emit('modal',[$page,$title,$dataid]);
    }

    public function close()
    {
        $this->isOpen = false;
    }

   

    public function openModal($id,$page,$title){

        $this->emit('modal',[$id,$page,$title]);

    }

    public function updatedPostcode(){

        $this->location="";
        $this->emit('location',[$this->postcode]);

    }

    public function mount(Request $request){

        $this->buttcustdetails=true;
        $this->buttdocument=false;
        $this->butthistory=false;
        $this->appid=$request->id;
        $this->message=array("message"=>"1","alert-type"=>"info");
   
       

        
       $this->loan=Loan::find($request->id);
       if(isset($this->loan->id)){

        $this->customer=$this->loan->Customer()->first();
        $this->contact=$this->customer->Contacts()->first();
        $this->address=$this->customer->Addresses()->first();


        $this->custid=$this->customer->id;
        $this->icnumber=$this->customer->icnumber;

        
        $this->policeic=$this->customer->policeic;
        $this->name=$this->customer->name;
        $this->phone=$this->contact->phonenumber;
        $this->email=$this->customer->email;
        $this->fulladdress=$this->address->address;
        $this->location=$this->address->location;
        $this->postcode=$this->address->postcode;
       

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

    public function editcustomer(Request $request){

        $cust=Customer::where("id",$this->custid)->first();
        $cust->update([
            'name'=>$this->name,
            'icnumber'=>$this->icnumber,
            'email'=>$this->email
        ]);

          //contact
         $cust->Contacts()->update([
            'phonenumber'=>$this->phone,
         ]);

         //address
         $cust->Addresses()->update([
            'address'=>$this->fulladdress,
            'location'=>$this->location,
            'postcode'=>$this->postcode
         ]);

 
        $this->message=array("message"=>"Customer Details Updated","alert-type"=>"success");

        $this->emit('showmessage',[$this->message]);
        $this->emit('closemodal');
    
    }

 
    public function togglebutton($button){

        $this->buttcustdetails=false;
        $this->buttdocument=false;
        $this->butthistory=false;

        $this->$button=true;

    }
}
