<?php

namespace App\Http\Livewire\Surau;

use Livewire\Component;
use App\Models\Khairat;
use App\Models\KhairatUser;
use Auth;

class KhairatData extends Component
{
    public $filter,$roles;

    public function mount(){

        $this->filter=(empty($this->filter))?date('Y'):$this->filter;
        $this->roles=Auth::user()->roles()->pluck('name')->ToArray();

      
    }
    public function render()
    {
        if(in_array('Admin',$this->roles)){
            
              $khairatdata=KhairatUser::whereHas('khairat', function($q){
                       $q->where('year', '>=',$this->filter);
                       })
                       ->paginate(30);
          }
  
          //dd($this->khairats);
  
          if(in_array('Owner',$this->roles)){
  
          }

        return view('livewire.surau.khairat-data',[
            'khairats'=>$khairatdata
        ]);
    }
}
