<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;
use Session;
use Auth;

class Userprofile extends Component
{
    public $uid;
    public function mount($uid=NULL){

     
        $this->uid=$uid;
    }
    public function render()
    {
        $message=Session::get('message');
        $alerttype=Session::get('alert-type');
        $toastrdata=array("message"=>$message,"alert-type"=>$alerttype);

         if(!empty($this->uid)){
            $user=User::find($this->uid);
            $type=1;
            if(!isset($user->id)){
                abort(404);
            }
         }else{
             $user=Auth::user();
             $type=2;
         }

        return view('livewire.user.userprofile',[
            'toastrdata'=>$toastrdata,
            'user'=>$user,
            'type'=>$type
        ]);
    }

   

    
}
