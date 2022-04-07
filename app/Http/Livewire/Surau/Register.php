<?php

namespace App\Http\Livewire\Surau;
use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\User;
use App\Models\Label;
use App\Models\Khairat;
use App\Models\KhairatUser;
use App\Models\FileUpload;
use App\Models\Address;
use App\Helpers\Formatter;
use Illuminate\Support\Facades\Hash;
use Auth;

class Register extends Component
{
    use WithFileUploads;

    public $name,$email,$street,$unit,$phone,$userstatus,$membership,$totalPayment,$attachment,$khairat;
    public $buttintro,$buttbenefits,$buttcond,$buttpayment,$buttcontact,$show,$public;
 
    protected $rules = [
        'name' => 'required|min:4',
        'unit'=>"required|regex:'^[0-9]{1,3}[a-zA-Z]{1}$'",
        'email' => 'required|unique:users|email',  
        'phone' => "required|regex:'^(01)[0-46-9]*[0-9]{7,8}$'",
        'street' => 'required',
        'membership' =>'required',
        'attachment'=>'required'
    ];

    public function updatedMembership(){

        $label=Label::find($this->membership);        
        $this->totalPayment=$label->other;
    }

    public function mount(){

        $this->khairat=Khairat::where('year',date('Y'))->first();
        $this->title=$this->khairat->name;
        $this->buttintro=true;
        $this->show=true;
        $this->public=true;
    }
 
    public function render()
    {
        if(isset(Auth::user()->id)){
            return view('livewire.surau.register',[
                'type'=>1
            ]);
        }else{
            return view('livewire.surau.register',[
                'type'=>0
            ])->layout('layouts.master-plain');
        }
       
    }

    public function register(){

        $addcount=0;
        $khairatid=Khairat::where('year',date('Y'))->first()->id;
        if(isset(Auth::user()->id)){
        $addcount=KhairatUser::where('userid',Auth::user()->id)->where('khairat',$khairatid)->count();
        $this->public=false;
        }else{
        $addcount=Address::where('location',$this->unit)->where('street',$this->street)->count();
        }

        if($addcount==0){

                if(!isset(Auth::user()->id)){
                    $this->validate();
                }
                else{
                    $this->validate([
                        'membership' =>'required',
                        'attachment'=>'required'
                    ]);
                }
            
                

                $formatter=new Formatter();
                //create user
                $number=User::count();
                $usercode=$formatter->generateCode($number+1,'SIM');

            // dd($usercode."|".$rolename."|".$this->role);

            if(!isset(Auth::user()->id)){
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

                    $userid=$user->id;

            }else{
                $userid=Auth::user()->id;
                $user=User::find($userid);
            }

                

            

                $path = $this->attachment->store('public/attachment/' . $usercode);

                $user->FileUploads()->create([
                    'name'=>'Payment Receipt',
                    'path'=>$path,
                    'type'=>'paymentreceipt'
                ]);

                //create khairat for this year
                KhairatUser::create([
                
                    'userid'=>$userid,
                    'khairat' => $khairatid,
                    'membership'=>$this->membership,
                    'attachment' => $path,
                    'status'=>env('DEFAULT_KHAIRAT')
                ]);

                $this->show=false;
                $this->message=array("message"=>"Record Successfully Created","alert-type"=>"success");

        }else{
            if(!isset(Auth::user()->id)){
            $this->message=array("message"=>"Unit Number already exist. Please contact system admin at haifizan@gmail.com","alert-type"=>"error");  
            }else{
            $this->message=array("message"=>"You already registered for year ".date('Y'),"alert-type"=>"error");      
            }
        }
        $this->emit('showmessage',[$this->message]);

    }

    public function togglebutton($button){

        $this->buttintro=false;
        $this->buttbenefits=false;
        $this->buttcond=false;
        $this->buttpayment=false;
        $this->buttcontact=false;

        $this->$button=true;

    }
}
