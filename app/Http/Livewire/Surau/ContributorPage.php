<?php

namespace App\Http\Livewire\Surau;

use Livewire\Component;
use App\Models\Fund;
use Auth;
class ContributorPage extends Component
{
    public $loader;
    public function mount($catid){
        $this->catid=$catid;

        if(empty($this->catid)){
            abort(404);
        }
    }
    public function render()
    {
        $this->loader="<div class=\"d-flex justify-content-center\"><div class=\"spinner-border text-info m-1\">
                       
                        </div></div>
                        <br/><span class=\"d-flex justify-content-center\">Creating bill, please wait...</span>";
        $this->createLink();
        return view('livewire.surau.contributor-page',[
            'loader'=>$this->loader
        ]);
    }

    public function createLink(){
         
       $fund=Fund::find($this->catid);
      
        $data = array(
            'userSecretKey'=>env('TOYYIBPAY_USER_SECRET_KEY'),
            'categoryCode'=>$fund->category,
            'billName'=>$fund->name,
            'billDescription'=>$fund->description,
            'billPriceSetting'=>0,
            'billPayorInfo'=>1,
            'billAmount'=>100,
            'billReturnUrl'=>env('APP_URL'),
            'billCallbackUrl'=>env('APP_URL').'/paystatus',
            'billExternalReferenceNo' => date('ymdhis').Auth::user()->usercode,
            'billTo'=>Auth::user()->name,
            'billEmail'=>Auth::user()->email,
            'billPhone'=>(isset(Auth::user()->contacts()->first()->phonenumber))?Auth::user()->contacts()->first()->phonenumber:"",
            'billSplitPayment'=>0,
            'billSplitPaymentArgs'=>'',
            'billPaymentChannel'=>'0',
            'billContentEmail'=>'Thank you for contributing!',
            'billChargeToCustomer'=>1,
            'billExpiryDate'=>'',
            'billExpiryDays'=>''
          );  
        
          $curl = curl_init();
          curl_setopt($curl, CURLOPT_POST, 1);
          curl_setopt($curl, CURLOPT_URL, env('TOYYIBPAY_URL').'/index.php/api/createBill');  
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        
          $result = curl_exec($curl);
          $info = curl_getinfo($curl);  
          curl_close($curl);
          $obj = json_decode($result);
          $this->loader="Redirecting...";
          //dd($obj[0]->BillCode);
          return redirect(env('TOYYIBPAY_URL')."/".$obj[0]->BillCode);
    }
}
