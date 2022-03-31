<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Helpers\Formatter;

class Edituser extends Component
{
    
    
    public $role,$name,$email,$nickname,$uid,$status,$statusname,$user;

    protected $rules = [
        'name' => 'required|min:4',
        'role'=>'required',
      //  'email' => 'required|unique:users|email',  
    ];

    public function mount($uid){
        $this->uid=$uid;

        $this->user=User::find($this->uid);
        $this->name=$this->user->name;
        $this->nickname=$this->user->nickname;
        $this->email=$this->user->email;
        $this->role=$this->user->roles()->first()->id;
        $this->rolename=$this->user->roles()->first()->name;
        $this->status=$this->user->isactive;
        $this->statusname=$this->user->Label()->first()->name;
    }

    public function render()
    {
      
        return view('livewire.user.edituser');
    }

    public function edituser(){


        $this->validate();

       // dd($this->status);
        $formatter=new Formatter();
        //$rolename=Role::find($this->role)->name;
     
     
        $this->user->update([
            'name' => $this->name,
            'nickname'=>$this->nickname,
           // 'email' => $this->email,
            'isactive'=>$this->status
        ]);
       
        $this->user->assignRole($this->role);

    
        $this->message=array("message"=>"User details updated","alert-type"=>"success");

        return redirect()->route('userlist')->with($this->message);

        
    }
}
