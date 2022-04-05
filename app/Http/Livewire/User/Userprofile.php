<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;
use Session;

class Userprofile extends Component
{
    public function render()
    {
        $message=Session::get('message');
        $alerttype=Session::get('alert-type');
        $toastrdata=array("message"=>$message,"alert-type"=>$alerttype);

        return view('livewire.user.userprofile',[
            'toastrdata'=>$toastrdata
        ]);
    }

    
}
