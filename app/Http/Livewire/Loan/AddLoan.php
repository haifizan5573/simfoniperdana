<?php

namespace App\Http\Livewire\Loan;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;


class AddLoan extends Component
{
    public $message,$icnumber,$policeic,$showcustform,$labeltxt;
    public $name,$phone,$email,$agent,$product,$remark;

    protected $searchrules=[
       'icnumber'=>'required_without:policeic',
       // 'policeic'=>'',
    ];

    protected $loanrules=[
        'name'=>'required',
        // 'policeic'=>'',
     ];

    public function mount(){
       
        $this->showcustform=false;
        $this->emit('load');
         
    }
    
    public function render()
    {
      return view('livewire.loan.addloan');
    }

    public function CustomerSearch(){

       $validated=$this->validate($this->searchrules);
       $this->name="";
       $this->email="";
       $this->phone="";
    
       $this->showcustform=true;
       $this->emit('disabled');
       $this->emit('load');
       
       $this->labeltxt="New Customer";
       $policeic=$this->policeic;
       $this->getCust=Customer::where('icnumber',$this->icnumber)
                        ->when (!empty($this->policeic) , function ($query) use($policeic){
                            return $query->where('policeic',$policeic);
                        })->first();
       if(isset($this->getCust->id)){
            $this->labeltxt="Existing Customer";
            $this->name=$this->getCust->name;
            $this->email=$this->getCust->email;
            $this->phone=$this->getCust->Contacts()->where('phonetype','default')->first()->phonenumber;
       }

    }

    public function AddLoan(Request $request){

        $validated=$this->validate($this->loanrules);
        $this->emit('load');

   


        $policeic=$this->policeic;
        $cust=Customer::where('icnumber',$this->icnumber)
                        ->when (!empty($this->policeic) , function ($query) use($policeic){
                            return $query->where('policeic',$policeic);
                        })->first();

        $status=Status::where('name','new')->first()->id;

        if(isset($cust->id)){ // update customer
            $custid=$cust->id;
            $cust->Update([
                'name'=>$this->name,
                'email'=>$this->email
            ]);

        
            $contact=$cust->Contacts()->where('phonetype','default')->first();
            $contact->Update(['phonenumber'=>$this->phone]);

        }else{ 
             //create customer

             $cust=Customer::create(
                [
                'icnumber'=>$this->icnumber,
                'policeic'=>$this->policeic,
                'name'=>$this->name,
                'email'=>$this->email
                ]
             );
             
             //contact
             $cust->Contacts()->Create([
                'phonenumber'=>$this->phone,
                'phonetype'=>'default' 
             ]);

             //address
             $cust->Addresses()->Create([
                'address'=>NULL,
             ]);


             $custid=$cust->id;
        }

            
             $idno=(!empty($this->icnumber))?$this->icnumber:$this->policeic;
             //loan application
             $loan=$cust->Loan()->create([
                'appid'=>date('ymdhis').substr($idno,12,2),
                'productid'=>$this->product,
                'agentid'=>$this->agent,
                'status'=>$status
            ]);

             //remark
             if(!empty($this->remark)){
                $loan->Remark()->create([
                    'remark'=>$this->remark,
                    'remark_by'=>Auth::user()->id
                ]);
             }

        //if success go to all application


       

        $result = array("alert-type" => "success", "message" => "New Application Added");
        return redirect()->route('applist')->with($result);

    }

    public function cancelForm(){
        $this->showcustform=false;
        $this->emit('load');
    }

    public function updatedProduct(){
       // $this->emit('load');
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
        $this->icnumber = $formatted;
    }
}
