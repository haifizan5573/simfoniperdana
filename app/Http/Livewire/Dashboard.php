<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Models\Label;
use App\Models\Form;
use App\Helpers\Formatter;
use App\Http\Livewire\API\SystemData;

class Dashboard extends Component
{
    public $search,$suraucat;
    public $searchResults = [];
   
    
    public function mount(){
        

      $this->suraucat=Label::where('type','category_surau')
                    ->where('isactive',1)
                    ->orderby('order','asc')->get();

      
    }

    public function render()
    {
        $formatter=new Formatter();
        $systemdata=new SystemData();
       
        return view('livewire.dashboard',[
            'formatter'=>$formatter,
            'forms'=>Form::where("status",1)->take(10)->get(),
            'simfoni'=>$systemdata->Teams('group_default',2),
        ]);
    }
}
