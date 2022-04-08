<?php

namespace App\Http\Livewire\Miscellaneous;

use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\Form;
use App\Models\FormUser;
use App\Models\User;
use App\Models\Label;
use App\Models\Khairat;
use App\Models\KhairatUser;
use App\Models\FileUpload;
use App\Models\Address;
use App\Helpers\Formatter;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;
use Auth;

class Forms extends Component
{

    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $keyuser=3;
    public $name,$email,$street,$unit,$phone,$userstatus,$attachment,$contribution,$paymenttype,$membername=array();
    public $show;
 
    protected $rules = [
        'name' => 'required|min:4',
        'unit'=>"required|regex:'^[0-9]{1,3}[a-zA-Z]{1}$'",
        'email' => 'required|unique:users|email',  
        'phone' => "required|regex:'^(01)[0-46-9]*[0-9]{7,8}$'",
        'street' => 'required',
        'attachment'=>'sometimes|required',
        'contribution'=>"sometimes|required|regex:'^[0-9]+$'",
        'paymenttype'=>'sometimes|required',
    ];
    public function mount($id){

        $this->form=Form::find($id);
        if(isset($this->form->id)){
        $this->formid=$id;
        $this->title=$this->form->title;
        $this->description=$this->form->description;
        $this->fund=$this->form->form_fund;
        $this->form_user=$this->form->form_user;
        $this->buttintro=true;
        $this->show=true;
        }else{
            abort(404);
        }
    }

    public function render()
    {
        if(isset(Auth::user()->id)){
            return view('livewire.miscellaneous.form',[
                'type'=>1
            ]);
        }else{
          return view('livewire.miscellaneous.form',[
              'type'=>0
          ])->layout('layouts.master-plain');   
        }
        
    }


    public function adduser(){
        $this->keyuser++;
    }

    public function deleteuser(){
        $this->keyuser--;
    }

    public function register(){


        $addcount=Address::where('location',$this->unit)->where('street',$this->street)->count();
        
        if($addcount==0){

            if(!isset(Auth::user()->id)){
                $this->validate();
            }else{
                $this->validate([
                    'contribution' =>'required',
                    'attachment'=>'required'
                ]);
            }
                

                $formatter=new Formatter();
                //create user
               

            // dd($usercode."|".$rolename."|".$this->role);

            if(!isset(Auth::user()->id)){
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
            }else{

                $userid=Auth::user()->id;
                $usercode=Auth::user()->usercode;
                $user=User::find($userid);
            }
            

              

                $contrib=(!isset($this->contribution))?0:$this->contribution;
                $payment=(!isset($this->paymenttype))?0:$this->paymenttype;

                //create khairat for this year
                $formuser=FormUser::create([
                
                    'userid'=>$user->id,
                    'formid' => $this->formid,
                    'contribution' => $contrib,
                    'paymenttype' => $payment,
                    'status'=>env('DEFAULT_KHAIRAT')
                ]);

                for($i=0;$i<$this->keyuser;$i++){
                    if(!empty($this->membername[$i])){
                        $formuser->members()->create([
                            "name"=>$this->membername[$i],
                            "usertype"=>"tahlil"
                        ]);
                    }
                }

                $path="";
                if(!empty($this->attachment)){

                $path = $this->attachment->store('public/attachment/' . $usercode);

                $formuser->FileUploads()->create([
                    'name'=>'Payment Receipt',
                    'path'=>$path,
                    'type'=>'paymentreceipt'
                ]);

                }

                $this->show=false;
                $this->message=array("message"=>"Record Successfully Created","alert-type"=>"success");

        }else{
            $this->message=array("message"=>"Unit Number already exist. Please contact system admin at haifizan@gmail.com","alert-type"=>"error");  
        }
        $this->emit('showmessage',[$this->message]);

    }
}
