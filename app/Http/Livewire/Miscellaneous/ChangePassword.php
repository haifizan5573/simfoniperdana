<?php

namespace App\Http\Livewire\Miscellaneous;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class ChangePassword extends Component
{
    public $password,$password_confirmation;
    protected $rules=[
        'password'=>'required|confirmed|min:6',
  
    ];
    public function render()
    {
        return view('livewire.miscellaneous.change-password')->layout('layouts.master-plain');
    }

    public function changepassword(){

        $this->validate();

        Auth()->user()->update([
            'password'=>Hash::make($this->password),
            'isactive'=>1
        ]);


        return redirect()->route('dashboard');

    }
}
