<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\User;
use Livewire\WithFileUploads;
use Auth;

class EditProfile extends Component
{
    use WithFileUploads;

    public $name,$avatar,$nickname,$uid;


    public function mount(){

        $this->uid=Auth::user()->id;
        $userdata = User::find($this->uid);
        $this->name=$userdata->name;
        $this->nickname=$userdata->nickname;
    }

    public function render()
    {
        return view('livewire.user.edit-profile');
    }


    public function editprofile(){


        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024'],
        ]);

        $user = User::find($this->uid);
        $user->name =$this->name;
        $user->nickname = $this->nickname;
        $user->avatar=$this->avatar;
        

        if ($this->avatar) {
            $avatar = $this->avatar;
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            // $avatarPath = public_path('/images/');
            // $avatar->move($avatarPath, $avatarName);
            // if (file_exists(public_path($user->avatar))) {
            //    unlink(public_path($user->avatar));
            // }
            $path=$this->avatar->store('public/attachment/'.$user->usercode);
            $user->avatar = $path;
        }
        $user->update();


        $this->dispatchBrowserEvent('alert', 
        ['type' => 'info',  'message' => 'User Profile Updated!']);
     
        return redirect()->route('showprofile',['id'=>$this->uid]);

    }
}
