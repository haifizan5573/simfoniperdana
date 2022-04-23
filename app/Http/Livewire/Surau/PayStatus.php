<?php

namespace App\Http\Livewire\Surau;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\FundUser;
use App\Models\User;
use Auth;
use Notification;
use App\Notifications\PaymentReceived;

class PayStatus extends Component
{
   
    public function render(Request $request)
    {
    
       $data = array(
        'billCode' => $request->billcode,
        //'billpaymentStatus' => '1'
      );  
  
      $curl = curl_init();
    
      curl_setopt($curl, CURLOPT_POST, 1);
      curl_setopt($curl, CURLOPT_URL, env('TOYYIBPAY_URL').'/index.php/api/getBillTransactions');  
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    
      $result = curl_exec($curl);
      $info = curl_getinfo($curl);  
      curl_close($curl);
      $obj = json_decode($result);
      //dd($obj);

      $funduser=FundUser::where('formdata',$obj[0]->billExternalReferenceNo)->first();

        $funduser->update([
            'contribution'=>$obj[0]->billpaymentAmount,
            'paymentstatus'=>$obj[0]->billpaymentSettlement,
            'paymentkey'=>$request->billcode
        ]);

        $userSchema = Auth::User();
  
        $offerData = [
            'title' => 'Contribution Received',
            'body' => 'We have received your contribution for '.$obj[0]->billName.' with'.$obj[0]->billpaymentSettlement.". You can check details under fund module. Thanks!",
        ];
  
        Notification::send($userSchema, new PaymentReceived($offerData));

        //to all ajk
        $committee=User::whereHas('roles',function($q){ $q->where('name','Surau Committee'); })->get();

        $offerData = [
            'title' => 'Contribution Received',
            'body' => Auth::user()->name.' had contribute for '.$obj[0]->billName.' with '.$obj[0]->billpaymentSettlement.".",
        ];
  
        Notification::send($committee, new PaymentReceived($offerData));

        //$this->message=array("message"=>"Payment received successfully","alert-type"=>"success");

        //return redirect()->route('product')->with($this->message);
        // dd('Task completed!');
        return view('livewire.surau.pay-status');
    }
}
