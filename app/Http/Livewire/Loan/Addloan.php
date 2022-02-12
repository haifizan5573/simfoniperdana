<?php

namespace App\Http\Livewire\Loan;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Customer;


class AddLoan extends Component
{
    public $message,$icnumber,$policeic,$showcustform,$labeltxt;
    public $name,$phone,$email,$agent,$product;

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
        dd($his->showcustform);
       // return view('livewire.loan.addloan');
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
            $this->phone=$this->getCust->Contacts()->pluck('phonenumber');
       }

    }

    public function AddLoan(){

        $validated=$this->validate($this->loanrules);
        $this->emit('load');

        dd($this->product);

        if(isset($this->getCust->id)){ // update customer
            $custid=$this->getCust->id;
            $this->getCust->Update([
                'name'=>$this->name,
                'email'=>$this->email
            ]);

            $contact=$this->getCust->Contacts()->where('phonetype','default')->first();
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

    }

    public function cancelForm(){
        $this->showcustform=false;
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
