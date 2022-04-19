<?php

namespace App\Http\Livewire\Surau;

use Livewire\Component;
use App\Models\Khairat;
use App\Models\FileUpload;
use App\Models\KhairatUser;

class KhairatSummary extends Component
{

    public $filter,$total=0,$currentbal=0,$expense=0,$totalreg=0,$curpage;

    public function mount(){

        $this->filter=(empty($this->filter))?date('Y'):$this->filter;
        
      
    }

    public function render()
    {

        $this->curpage="khairat";
        $data=$this->khairatdata();

        return view('livewire.surau.khairat-summary',[
            'total'=>$data[0],
            'expense'=>$data[1],
            'balance'=>$data[2],
            'totalreg'=>$data[3]
        ]);
    }

    public function updateFilter(){


        $this->khairatdata();
        $this->mount();

    }

    public function khairatdata(){

        $this->total=0;
        $this->expense=0;
        $khairatdata=KhairatUser::whereHas('khairat', function($q){
            $q->where('year', '=',$this->filter);
            })->get();

        foreach($khairatdata as $khairat){

            $this->total+=str_replace("RM","",$khairat->Membership()->first()->other);

        }

        $this->total=($this->total>0)?'RM'.number_format($this->total,2):'-';
        $this->expense=($this->expense>0)?'RM'.number_format($this->expense,2):'-';
        $this->currentbal=($this->expense>0)?$this->total-$this->expense:$this->total;
        $this->totalreg=count($khairatdata);

        return array($this->total,$this->expense,$this->currentbal,$this->totalreg);
    }
}
