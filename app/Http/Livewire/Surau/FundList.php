<?php

namespace App\Http\Livewire\Surau;

use Livewire\Component;
use App\Models\Fund;
use App\Models\FundUser;
use App\Models\User;
use Toyyibpay;
use Carbon\Carbon;
use Notification;
use App\Notifications\FundCreated;

class FundList extends Component
{
    public $search,$curpage;
    public $name,$description,$fixamount,$category,$target,$enddate;

    
    protected $rules = [
        'name' => 'required|min:4',
        'description'=>'required',
        'enddate' => 'nullable|after:today',   
    ];

 
    public function render()
    {
        $this->curpage="fund";
          $funds=Fund::when(!empty($this->search),function($q){
                 
                $q->where('name','like','%'.$this->search.'%');
                
            })
            ->paginate(30);

        return view('livewire.surau.fund',[
                     'funds'=>$funds
                    ]);
    }


    public function open($pagemodal,$title,$dataid)
    {
        $this->pagemodal = $pagemodal;
        $this->title = $title;
        $data=[];

        if(!empty($dataid)){

        }

        // $data=array('startdate'=>$this->startdate,'enddate'=>$this->enddate,'category'=>$this->categoryplaceholder,'status'=>$this->statusplaceholder,'description'=>$this->description);
            
        $this->emit('modal',[$this->pagemodal,$this->title,$data]);
    }

    public function addfund(){

        $this->validate();

        $formatted_enddate=NULL;
        if(!empty($this->enddate)){
            $formatted_enddate=Carbon::createFromFormat('d M, Y',$this->enddate)->format('Y-m-d');
        }

         $data = array(
            'catname' => $this->name, //CATEGORY NAME
            'catdescription' =>$this->description, //PROVIDE YOUR CATEGORY DESCRIPTION
            'userSecretKey' => env('TOYYIBPAY_SANDBOX') //PROVIDE USER SECRET KEY HERE
          );  
        
          $curl = curl_init();
        
          curl_setopt($curl, CURLOPT_POST, 1);
          curl_setopt($curl, CURLOPT_URL, 'https://dev.toyyibpay.com/index.php/api/createCategory');  //PROVIDE API LINK HERE
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        
          $result = curl_exec($curl);
        
          $info = curl_getinfo($curl);  
          curl_close($curl);
        
          $obj = json_decode($result);
   //dd(env('TOYYIBPAY_SANDBOX'));
          dd($obj);
        if(isset($obj->CategoryCode)){
            Fund::create([
                'name'=>$this->name,
                'description'=>$this->description,
                'fixamount'=>$this->fixamount,
                'category'=>$obj->CategoryCode,
                'target'=>$this->target,
                'expiry_date'=>$formatted_enddate,
            ]);
        
            $alluser=User::where('isactive',1)->get();

            $offerData = [
                'title' => 'New fundraising event created',
                'body' => $this->name.' created, you can start your donation today!',
            ];
      
            Notification::send($alluser, new FundCreated($offerData));

            $this->message=array("message"=>"Fund added successfully","alert-type"=>"success");
        }else{
            $this->message=array("message"=>"ToyibbPay Error: unable to create category. Please try again","alert-type"=>"error");
        }

            $this->emit('showmessage',[$this->message]);
            $this->emit('closemodal');
            $this->mount(); 

    }

    public function fundlink(){

        $some_data = array(
            'userSecretKey'=>env('TOYYIBPAY_USER_SECRET_KEY'),
            'categoryCode'=>'bc0apxrf',
            'billName'=>'Derma Surau',
            'billDescription'=>'Derma Keperluan Surau',
            'billPriceSetting'=>0,
            'billPayorInfo'=>1,
            'billAmount'=>100,
            'billReturnUrl'=>'https://simfoniperdana.com',
            'billCallbackUrl'=>'https://simfoniperdana.com/paystatus',
            'billExternalReferenceNo' => 'AFR341DFI',
            'billTo'=>'John Doe',
            'billEmail'=>'jd@gmail.com',
            'billPhone'=>'0194342411',
            'billSplitPayment'=>0,
            'billSplitPaymentArgs'=>'',
            'billPaymentChannel'=>'0',
            'billContentEmail'=>'Thank you for purchasing our product!',
            'billChargeToCustomer'=>1,
            'billExpiryDate'=>'',
            'billExpiryDays'=>''
          );  
        
          $curl = curl_init();
          curl_setopt($curl, CURLOPT_POST, 1);
          curl_setopt($curl, CURLOPT_URL, 'https://toyyibpay.com/index.php/api/createBill');  
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);
        
          $result = curl_exec($curl);
          $info = curl_getinfo($curl);  
          curl_close($curl);
          $obj = json_decode($result);
          dd("https://toyyibpay.com/".$obj[0]->BillCode);
    }

}
