<?php

namespace App\Http\Livewire\Surau;
use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\User;
use App\Models\Label;
use App\Models\Khairat;
use App\Models\KhairatUser;
use App\Helpers\Formatter;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    use WithFileUploads;

    public $name,$email,$street,$unit,$phone,$userstatus,$membership,$totalPayment,$attachment;
 
    protected $rules = [
        'name' => 'required|min:4',
        'unit'=>"required|regex:'^[0-9]{1,3}[a-zA-Z]{1}$'",
        'email' => 'required|unique:users|email',  
        'phone' => 'required',
        'street' => 'required',
        'membership' =>'required',
        'attachment'=>'required'
    ];

    public function updatedMembership(){

        $label=Label::find($this->membership);        
        $this->totalPayment=$label->other;
    }
 
    public function render()
    {
        return view('livewire.surau.register')->layout('layouts.master-plain');
    }

    public function register(){

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
          
            'userid'=>$this->user->id,
            'khairat' => $khairatid,
            'membership'=>$this->membership,
            'attachment' => Hash::make('abc123'),
            'status'=>env('DEFAULT_KHAIRAT')
        ]);

        $this->message=array("message"=>"Record Successfully Created","alert-type"=>"success");

        $this->emit('showmessage',[$this->message]);

    }
}
