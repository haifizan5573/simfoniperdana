<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class Adduser extends Component
{
    public function render()
    {
        return view('livewire.user.adduser');
    }

    public function adduser(){

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make('abc123'),
            'isactive'=>0
        ]);
       
        $user->assignRole($this->role);

        $data = [
            'name' => env('appname'),
            'subject' => env('appname').' New User Registration',
            'newuser' => $this->name,
            'content' => 'We are pleased to inform you that your '.env('appname').' account has been created. Your account details as folows;<br/>
             '.env('appname').' Url: <a href="'.env('appnameurl').'">'.env('appnameurl').'/a><br/>
             Username: '.$this->email.'<br/>
             Temporary Password: abc123<br/><br/>

            Please change your password once login access granted.'
        
        ];

        Mail::to($this->email)->send(new NewUser($data));
    }
}
