<?php

namespace App\Http\Livewire\Surau;

use Livewire\Component;
use App\Models\Khairat;

class Tahlil extends Component
{
    public function mount(){

        $this->khairat=Khairat::where('year',date('Y'))->first();
        $this->title=$this->khairat->name;
        $this->buttintro=true;
        $this->show=true;
    }

    public function render()
    {
        return view('livewire.surau.tahlil')->layout('layouts.master-plain');
    }

    public function register(){


        $addcount=Address::where('location',$this->unit)->where('street',$this->street)->count();
        
        if($addcount==0){

                $this->validate();
                

                $formatter=new Formatter();
                //create user
                $number=User::count();
                $usercode=$formatter->generateCode($number+1,'SIM');

            // dd($usercode."|".$rolename."|".$this->role);

                $user = User::create([
                    'name' => $this->name,
                    'nickname'=>'',
                    'email' => $this->email,
                    'usercode'=>$usercode,
                    'password' => Hash::make('abc123'),
                    'isactive'=>2
                ]);
            
                $user->assignRole(env('DEFAULT_ROLE'));

                
                    //contact
                    $user->Contacts()->Create([
                        'phonenumber'=>$this->phone,
                        'phonetype'=>'default' 
                    ]);

                    //address
                    $user->Addresses()->Create([
                        'location'=>strtoupper($this->unit),
                        'street'=>$this->street,
                        'addresstype'=>'default'
                    ]);

            

                $khairatid=Khairat::where('year',date('Y'))->first()->id;

            

                $path = $this->attachment->store('public/attachment/' . $usercode);

                $user->FileUploads()->create([
                    'name'=>'Payment Receipt',
                    'path'=>$path,
                    'type'=>'paymentreceipt'
                ]);

                //create khairat for this year
                KhairatUser::create([
                
                    'userid'=>$user->id,
                    'khairat' => $khairatid,
                    'membership'=>$this->membership,
                    'attachment' => $path,
                    'status'=>env('DEFAULT_KHAIRAT')
                ]);

                $this->show=false;
                $this->message=array("message"=>"Record Successfully Created","alert-type"=>"success");

        }else{
            $this->message=array("message"=>"Unit Number already exist. Please contact system admin at haifizan@gmail.com","alert-type"=>"error");  
        }
        $this->emit('showmessage',[$this->message]);

    }
}
