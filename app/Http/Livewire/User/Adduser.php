<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Helpers\Formatter;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewUser;
use Illuminate\Support\Facades\Hash;
use App\Models\Address;

class Adduser extends Component
{

    public $role,$name,$email,$nickname,$street,$unit,$phone;

    protected $rules = [
        'name' => 'required|min:4',
        'role'=>'required',
        'email' => 'required|unique:users|email',
        'phone' => "sometimes:regex:'^(01)[0-46-9]*[0-9]{7,8}$'",
        'unit'=>"required|regex:'^[0-9]{1,3}[a-zA-Z]{1}$'",
        'street' => 'required',

    ];

    public function mount(){

     
    }
  

    public function render()
    {
        
       
        return view('livewire.user.adduser',[
           // 'roles'=>Role::all(),
        ]);
    }

    public function updatedStreet(){

        $this->emit('unit',[$this->street]);
    }
    public function adduser(){

     
        $this->validate();

    
        $addcount=Address::where('location',$this->unit)->where('street',$this->street)->count();
        
        if($addcount==0){

        $formatter=new Formatter();
        //$rolename=Role::find($this->role)->name;
        //dd($rolename);
        $number=User::count();
        $usercode=$formatter->generateCode($number+1,'SIM');

       // dd($usercode."|".$rolename."|".$this->role);

        $user = User::create([
            'name' => $this->name,
            'nickname'=>$this->nickname,
            'email' => $this->email,
            'usercode'=>$usercode,
            'password' => Hash::make('abc123'),
            'isactive'=>2
        ]);

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

       
        $user->assignRole($this->role);

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

        
        $result = array("alert-type" => "success", "message" => "New User Created");
        }else{
            $this->message=array("message"=>"Unit Number already exist","alert-type"=>"error");  
        }
        return redirect()->route('userlist')->with($result);

    
    }
}
