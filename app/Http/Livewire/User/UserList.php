<?php

namespace App\Http\Livewire\User;

use App\Http\Livewire\API\SystemData;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Session;
use Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class UserList extends Component
{

    use WithPagination;
    use AuthorizesRequests;
    

     public $search,$filter,$street,$pagemodal,$title,$userid=array(),$group;
     public $sortField="email";
     public $sortAsc = true;
     protected $queryString = ['search', 'sortAsc', 'sortField'];
     protected $paginationTheme = 'bootstrap';

    public function mount(){
         $this->sortField="status";
         $this->sortAsc=false;

       

         $permission=Auth::user()->getAllPermissions()->pluck('name')->toArray();
        
         if(!in_array('userlist',$permission)){
            abort(404);
         }
   
     }

     public function sortBy($field)
     {
         if ($this->sortField === $field) {
             $this->sortAsc = !$this->sortAsc;
         } else {
             $this->sortAsc = true;
         }
 
         $this->sortField = $field;
     }
 
     public function updatingSearch()
     {
         $this->resetPage();
     }
    public function render()
    {
        $message=Session::get('message');
        $alerttype=Session::get('alert-type');
        $toastrdata=array("message"=>$message,"alert-type"=>$alerttype);

        $systemdata=new SystemData();
        $streetlist=$systemdata->streetlist(1);

      
        $users=User::with("roles")->whereHas("roles", function($q) {   

            if(!empty($this->filter)){
                $q->where("name",$this->filter);
            }                                                                                                       
            
        })
        ->when(!empty($this->search),function($q){
            $q->where('name','like','%'.$this->search.'%');
        })
        ->paginate(30);
        
        return view('livewire.user.userlist',[
            'users'=>$users,
            'streetlist'=>$streetlist,
            'toastrdata'=>$toastrdata
        ]);

        
    }

    public function open($pagemodal,$title)
    {
        $this->pagemodal = $pagemodal;
        $this->title = $title;
        $content="";

       

        foreach(User::all() as $userdata){
            if(isset($this->userid[$userdata->id])&&$this->userid[$userdata->id]==true){
                $content.=$userdata->name."<br/>";
            }
           // dd($userdata->name);
        }

        
        $this->emit('modal',[$this->pagemodal,$this->title,$content]);
    }

    public function attachtogroup(){




        foreach(User::all() as $userdata){
            if(isset($this->userid[$userdata->id])&&$this->userid[$userdata->id]==true){
                //$teamuser=User::find($this->userid[$userdata->id]);
                $userdata->Team()->detach($this->group);
                $userdata->Team()->attach($this->group);
                $this->userid[$userdata->id]=false;
            }
         // dd($userdata->name);
        }

        $this->message=array("message"=>"User added to group successfully","alert-type"=>"success");

        $this->emit('showmessage',[$this->message]);
        $this->emit('closemodal');
        $this->mount(); 


    }

}



