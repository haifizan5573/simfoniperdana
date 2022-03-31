<?php

namespace App\Http\Livewire\Loan;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Loan;
use App\Models\Customer;
use App\Models\Employer;
use App\Models\Contact;
use App\Models\Address;
use App\Models\FileUpload;
use App\Models\Documents;
use App\Models\LoanDocuments;
use App\Helpers\Formatter;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Purifier;

class ViewApplication extends Component
{
    use WithFileUploads;
    public $appid,$loan,$customer,$contact,$address,$payslip,$remark;
    public $buttcustdetails,$buttdocument,$butthistory,$message;
    public $custid,$name,$phone,$email,$postcode,$location,$fulladdress,$fulladdressview;
    public $employer,$employerdata,$employername,$employeraddress,$employerphone,$datejoined,$datejoinedformatted,$jobtitle;
    public $productgroup,$productgroupid,$productname,$productnameid,$amountapplied,$amountapproved,$datesubmitted,$dateapproved,$tenureapplied,$tenureapproved,$datedisbursed,$daterejected;
    public $paysliptype=[],$label=[],$amount=[];
    public $keyincome=3,$keydeduction=3,$basicincome,$labelincome=array(),$labeldeduction=array(),$amountincome=array(),$amountdeduction=array(),$income,$deduction,$totalincome,$totaldeduction,$netincome,$netincomepercen,$payslipattachment,$payslipattachmentview;
    public $docstatus=array(),$agentid,$agentname,$status,$appstatus;
    public $isOpen = false;
    public $page = "";
    public $dataid = "";
    public $title = "";
    protected $formatter;

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

    public function updatedProductgroup(){

        $this->emit('productname',[$this->productgroup]);

    }

    public function mount($appid){

        $this->buttcustdetails=true;
        $this->buttdocument=false;
        $this->butthistory=false;
        $this->appid=$appid;
        $this->message=array("message"=>"1","alert-type"=>"info");
        $this->totalincome=0;
        $this->totaldeduction=0;

        $this->doclistall = Documents::all();
        $this->doclist = Documents::where('type', 'basic')->get();
        $this->doclistadd = Documents::where('type', 'additional')->where('group', '')->get();

    
        $this->formatter=new Formatter();

        
       $this->loan=Loan::find($appid);
       if(isset($this->loan->id)){

        $this->fileid=$this->loan->appid;
        $this->status=(isset($this->loan->Status()->first()->name))?$this->loan->Status()->first()->name:"";
        $this->customer=$this->loan->Customer()->first();
        $this->contact=$this->customer->Contacts()->first();
        $this->address=$this->customer->Addresses()->first();

        $this->fulladdressview=$this->formatter->formatAddress($this->address);


        $this->custid=$this->customer->id;
        $this->icnumber=$this->customer->icnumber;

        
        $this->policeic=$this->customer->policeic;
        $this->name=$this->customer->name;
        $this->phone=$this->contact->phonenumber;
        $this->email=$this->customer->email;
        $this->fulladdress=$this->address->address;
        $this->location=$this->address->location;
        $this->postcode=$this->address->postcode;

        $this->employername=(isset($this->customer->Employer->name))?$this->customer->Employer->name:"";
        $this->jobtitle=$this->customer->jobtitle;
        $this->datejoined=$this->customer->datejoined;
        $this->datejoinedformatted=(!empty($this->datejoined))?Carbon::parse($this->datejoined)->format('d M, Y'):"";
       

        $this->employerdata=Employer::find($this->customer->employerid);
        $this->employeraddress=(isset($this->employerdata->id)&&isset($this->employerdata->Addresses()->first()->address))?$this->formatter->formatAddress($this->employerdata->Addresses()->first()):"";
        $this->employerphone=(isset($this->employerdata->id)&&isset($this->employerdata->Contacts()->first()->phonenumber))?$this->employerdata->Contacts()->first()->phonenumber:"";

        //loan

        $this->productgroupid=(isset($this->loan->Product->ProductGroup->id))?$this->loan->Product->ProductGroup->id:"";
        $this->productgroup=(isset($this->loan->Product->ProductGroup->name))?$this->loan->Product->ProductGroup->name:"";
        $this->productname=(isset($this->loan->Product->name))?$this->loan->Product->name:"";
        $this->productnameid=(isset($this->loan->Product->id))?$this->loan->Product->id:"";
        $this->amountapproved=(isset($this->loan->amountapproved))?$this->loan->amountapproved:"";
        $this->amountapplied=(isset($this->loan->amountapplied))?$this->loan->amountapplied:"";
        $this->tenureapproved=(isset($this->loan->tenureapproved))?$this->loan->tenureapproved:"";
        $this->tenureapplied=(isset($this->loan->tenureapplied))?$this->loan->tenureapplied:"";
        $this->datesubmittedformatted=(!empty($this->loan->submitteddate))?Carbon::parse($this->loan->submitteddate)->format('d M, Y'):"";
        $this->dateapprovedformatted=(!empty($this->loan->approvaldate))?Carbon::parse($this->loan->approvaldate)->format('d M, Y'):"";
        $this->datedisbursedformatted=(!empty($this->loan->disburseddate))?Carbon::parse($this->loan->disburseddate)->format('d M, Y'):"";
        $this->daterejectedformatted=(!empty($this->loan->rejecteddate))?Carbon::parse($this->loan->rejecteddate)->format('d M, Y'):"";
        $this->agentname=(!empty($this->loan->agentid))?$this->loan->Agent()->first()->name:"";
        $this->agentid=$this->loan->agentid;

        //payslip
        $this->basicincome=(isset($this->customer->Payslip()->where('type','basicincome')->first()->amount))?$this->customer->Payslip()->where('type','basicincome')->first()->amount:"";
        $this->income=$this->customer->Payslip()->where('type','income')->get();
        $this->deduction=$this->customer->Payslip()->where('type','deduction')->get();

        if(!empty($this->basicincome)){
            $this->totalincome+=$this->basicincome;
        }
       
        if(count($this->income)){
            $i=0;
            foreach($this->income as $inclist){
                $this->labelincome[$i]=$inclist->name;
                $this->amountincome[$i]=$inclist->amount;
                $this->totalincome+=$inclist->amount;
                $i++;
            }

        }

        if(count($this->deduction)){
            $i=0;
            foreach($this->deduction as $deductlist){
                $this->labeldeduction[$i]=$deductlist->name;
                $this->amountdeduction[$i]=$deductlist->amount;
                $this->totaldeduction+=$deductlist->amount;
                $i++;
            }

        }

        $this->netincome=$this->totalincome-$this->totaldeduction;
        $this->netincomepercen=($this->netincome>0)?($this->netincome/$this->totalincome)*100:"";
        $this->payslipattachmentview=($this->customer->FileUploads()->where('type','payslip')->first())?$this->customer->FileUploads()->where('type','payslip')->first():"";

        $docdata = LoanDocuments::where('loan_id', $appid)->get();



        foreach ($docdata as $data) {

            //$this->docremark[$data->doc_id] = $data->remark;
            $this->docstatus[$data->doc_id] = ($data->status == 1) ? $data->status : '';
        }

       }else{
           abort(404);
       }

    }
    
    public function render()
    {
      
        return view('livewire.loan.view-application');
    }

    public function addincome(){
        $this->keyincome++;
    }

    public function adddeduction(){
        $this->keydeduction++;
    }

    public function deletededuction(){
        $this->keydeduction--;
    }

    public function deleteincome(){
        $this->keyincome--;
    }


    public function addremark(){

        $loan = Loan::find($this->appid);
        $cleanremark = Purifier::clean($this->remark);

        if(!empty($cleanremark)){
            $remark = $loan->remarks()->create([
                'remark' => $cleanremark,
                'remark_by' => Auth::user()->id
            ]);

            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'info',  'message' => 'New comment added']
            );
        }

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
        $this->mount($this->appid);
    
    }

    public function editemployer(){
        $this->formatter=new Formatter();
       // dd($this->datejoined);
        $cust=Customer::where("id",$this->custid)->first();

        if(!empty($this->datejoined)){
            $cust->datejoined=$this->formatter->formatDate($this->datejoined);
        }

        if(!empty($this->employer)){
            $cust->employerid=$this->employer;
        }

        $cust->jobtitle=$this->jobtitle;

        $cust->update();

  
        $this->message=array("message"=>"Employer Details Updated","alert-type"=>"success");

        $this->emit('showmessage',[$this->message]);
        $this->emit('closemodal');
        $this->mount($this->appid);

    }

    public function editloan(){

        $cust=Loan::where("appid",$this->loan->appid)->first();
        $this->formatter=new Formatter();

       // dd($this->datesubmitted);

        if(!empty($this->datesubmitted)){
            $cust->submitteddate=$this->formatter->formatDate($this->datesubmitted);
        }

        if(!empty($this->dateapproved)){
            $cust->approvaldate=$this->formatter->formatDate($this->dateapproved);
        }

        if(!empty($this->datedisbursed)){
            $cust->disburseddate=$this->formatter->formatDate($this->datedisbursed);
        }

        if(!empty($this->daterejected)){
            $cust->rejecteddate=$this->formatter->formatDate($this->daterejected);
        }

        if(!empty($this->productname)){
            $cust->productid=$this->productname;
        }
        
        $cust->tenureapplied=$this->tenureapplied;
        $cust->tenureapproved=$this->tenureapproved;
        $cust->amountapplied=$this->amountapplied;
        $cust->amountapproved=$this->amountapproved;

        $cust->update();
        $this->message=array("message"=>"Loan Details Updated","alert-type"=>"success");

        $this->emit('showmessage',[$this->message]);
        $this->emit('closemodal');
        $this->mount($this->appid);

    }

    public function editpayslip(){


        //dd($this->labelincome);

        $cust=Customer::where("id",$this->custid)->first();

        $cust->Payslip()->delete();

        if(!empty($this->basicincome)){
            $cust->Payslip()->create([
                'name'=>'Basic Income',
                'amount'=>$this->basicincome,
                'type'=>'basicincome'
            ]);
        }

        for($i=0;$i<$this->keyincome;$i++){
            if(!empty($this->labelincome[$i])&&!empty($this->amountincome[$i])){
                $cust->Payslip()->create([
                    'name'=>$this->labelincome[$i],
                    'amount'=>$this->amountincome[$i],
                    'type'=>'income'
                ]);
             }
        }

        for($i=0;$i<$this->keydeduction;$i++){
            if(!empty($this->labeldeduction[$i])&&!empty($this->amountdeduction[$i])){
                $cust->Payslip()->create([
                    'name'=>$this->labeldeduction[$i],
                    'amount'=>$this->amountdeduction[$i],
                    'type'=>'deduction'
                ]);
            }
         }

         $this->message=array("message"=>"Payslip Updated","alert-type"=>"success");

         $this->emit('showmessage',[$this->message]);
         $this->emit('closemodal');
         $this->mount($this->appid);

    }

    public function payslipattachment(){

        $this->validate([
            'payslipattachment' => 'required', // 1MB Max
        ]);

        $cust=Customer::where("id",$this->custid)->first();
        $path = $this->payslipattachment->store('public/attachment/' . $this->icnumber);

        $cust->FileUploads()->create([
            'name'=>'Payslip',
            'path'=>$path,
            'type'=>'payslip'
        ]);

        $this->message=array("message"=>"Payslip Added","alert-type"=>"success");

        $this->emit('showmessage',[$this->message]);
        $this->emit('closemodal');
        $this->mount($this->appid);
    }

    public function editdocu(){


        foreach ($this->doclistall as $docu) {

            $checkdoc = LoanDocuments::where('doc_id', $docu->id)->where('loan_id', $this->appid)->first();


            if (empty($checkdoc->id)) { //exist
                LoanDocuments::create([
                    'doc_id' => $docu->id,
                    'loan_id' => $this->appid,
                    'name' => $docu->name,
                    'status' => (isset($this->docstatus[$docu->id])) ? $this->docstatus[$docu->id] : '',
                   // 'remark' => (isset($this->docremark[$docu->id])) ? $this->docremark[$docu->id] : ''
                ]);
            } else {
                //dd($this->docstatus);
                $checkdoc->update([
                    'status' => (isset($this->docstatus[$docu->id])) ? $this->docstatus[$docu->id] : '',
                    //'remark' => (isset($this->docremark[$docu->id])) ? $this->docremark[$docu->id] : ''
                ]);
            }
        }

        $this->message=array("message"=>"Document List Updated","alert-type"=>"success");

        
        $this->emit('showmessage',[$this->message]);
        $this->emit('closemodal');
        $this->mount($this->appid);
        $this->togglebutton('buttdocument');
    }

    public function editloandetails(){

       // dd($this->appstatus);

        $loan = Loan::find($this->appid);

        if(!empty($this->agentid)){
        $loan->agentid=$this->agentid;
        }

        if(!empty($this->appstatus)){
        $loan->status=$this->appstatus;  
        }

        $loan->update();

        $this->message=array("message"=>"Loan Details Updated","alert-type"=>"success");

        
        $this->emit('showmessage',[$this->message]);
        $this->emit('closemodal');
        $this->mount($this->appid);
       
    }


 
    public function togglebutton($button){

        $this->buttcustdetails=false;
        $this->buttdocument=false;
        $this->butthistory=false;

        $this->$button=true;

    }

    public function formatIC(){
        $icnumber = $this->icnumber;
        $icnumber= preg_replace('/[^0-9]+/', '', $icnumber);
        $icnumber = substr($icnumber, 0, 12);
        $length = strlen($icnumber);
        $formatted = "";
        for ($i = 0; $i < $length; $i++) { 
            $formatted .= $icnumber[$i];
            if($i == 5 || $i == 7){
                $formatted .= "-";
            }
        }
        $this->icnumber=$formatted;
    }
  
}
