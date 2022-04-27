<?php

namespace App\Http\Livewire\Simfoni;

use Livewire\Component;
use Livewire\WithPagination;
use Session;
use  App\Http\Livewire\API\SystemData;
use App\Models\User;

class Resident extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
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
        ->whereHas("Addresses", function($q) {   

            if(!empty($this->street)){
                $q->where("street",$this->street);
            }                                                                                                       
            
        })
        ->paginate(30);

        return view('livewire.simfoni.resident',[
            'streetlist'=>$streetlist,
            'users'=>$users
        ]);
    }
}
