<?php

namespace App\Http\Livewire\Surau;

use Livewire\Component;
use App\Models\Fund;
use Auth;
use App\Models\FundUser;

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

        //add fund_user

       $refid=date('ymdhis').Auth::user()->usercode;

       FundUser::create([
           'userid'=>Auth::user()->id,
           'fundid'=>$fund->id,
           'formdata'=>$refid,
       ]);
         
      
      
        $data = array(
            'userSecretKey'=>env('TOYYIBPAY_USER_SECRET_KEY'),
            'categoryCode'=>$fund->category,
            'billName'=>$fund->name,
            'billDescription'=>$fund->description,
            'billPriceSetting'=>0,
            'billPayorInfo'=>1,
            'billAmount'=>100,
            'billReturnUrl'=>env('APP_URL').'/paystatus',
            'billCallbackUrl'=>env('APP_URL').'/paystatus',
            'billExternalReferenceNo' => $refid,
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
         // dd($obj);
          if(isset($obj[0]->BillCode)){
            return redirect(env('TOYYIBPAY_URL')."/".$obj[0]->BillCode);
          }else{
            $this->loader="Error";
          }
         
    }
}
