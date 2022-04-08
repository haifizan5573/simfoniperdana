<?php

namespace App\Http\Livewire\Miscellaneous;

use Livewire\Component;
use App\Models\User;
use App\Models\Address;
use App\Helpers\Formatter;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewUser;

class Register extends Component
{

    public $name,$email,$street,$unit,$phone,$userstatus,$show,$public;

    protected $rules = [
        'name' => 'required|min:4',
        'unit'=>"required|regex:'^[0-9]{1,3}[a-zA-Z]{1}$'",
        'email' => 'required|unique:users|email',  
        'phone' => "required|regex:'^(01)[0-46-9]*[0-9]{7,8}$'",
        'street' => 'required',
      
    ];


    public function mount(){

     
        $this->show=true;
        $this->public=true;
       
    }

    public function render()
    {
        return view('livewire.miscellaneous.register')->layout('layouts.master-plain');
    }

    public function register(){

        $addcount=0;
      
        $addcount=Address::where('location',$this->unit)->where('street',$this->street)->count();
        

        if($addcount==0){

               
                $this->validate();
          
                $formatter=new Formatter();
                //create user
                $number=User::count();
                $usercode=$formatter->generateCode($number+1,'SIM');

          
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

                    $data = [
                        'name' => env('APP_NAME'),
                        'subject' => env('APP_NAME').' New User Registration',
                        'newuser' => $this->name,
                        'content' => 'We are pleased to inform you that your '.env('APP_NAME').' account has been created. Your account details as folows;<br/>
                         '.env('APP_NAME').' Url: <a href="'.env('APP_NAMEURL').'">'.env('APP_NAMEURL').'</a><br/>
                         Username: '.$this->email.'<br/>
                         Temporary Password: abc123<br/><br/>
            
                        Please change your password once login access granted.'
                    
                    ];
            
                    Mail::to($this->email)->send(new NewUser($data));
            
      
                $this->show=false;
                $this->message=array("message"=>"Record Successfully Created","alert-type"=>"success");

        }else{
           
            $this->message=array("message"=>"Unit Number already exist. Please contact system admin at haifizan@gmail.com","alert-type"=>"error");  
           
        }
        $this->emit('showmessage',[$this->message]);

    }
}
