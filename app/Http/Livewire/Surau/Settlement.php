<?php

namespace App\Http\Livewire\Surau;

use Livewire\Component;
use App\Models\FundUser;
use App\Models\Fund;
use App\Http\Livewire\API\SystemData;
use Auth;

class Settlement extends Component
{
    public $fundid,$curpage,$roles,$search,$street,$billcode;

    public function mount($fundid){
        $this->fundid=$fundid;
        $this->roles=Auth::user()->roles()->pluck('name')->ToArray();
    }
    public function render()
    {
        $fund=Fund::find($this->fundid);
        $funduser=FundUser::whereHas("User", function($q) {   

            if(!empty($this->search)){
                $q->where("name",'like','%'.$this->search.'%');
            }                                                                                                       
            
          })
          ->whereHas("Addresses", function($q) {   

            if(!empty($this->street)){
                $q->where("street",$this->street);
            }                                                                                                       
            
          })
            ->where("fundid",$this->fundid)
            ->paginate(30);
        
        $systemdata=new SystemData();
        $streetlist=$systemdata->streetlist(1);
        $plotdata=array();
        foreach($streetlist as $street){

            $totalcontrib=FundUser::whereHas("Addresses", function($q) use ($street) {   
    
                    $q->where("street",$street['name']);
                                                                                                               
              })
            ->where("fundid",$this->fundid)
            ->sum('contribution');

           $plotdata[]=array(
                        "x"=>$street['name'],
                        "y"=>$totalcontrib,
                    );
        }

        $plotdata=json_encode($plotdata);

       // dd($plotdata);

        return view('livewire.surau.settlement',[
            'fundusers'=>$funduser,
            'streetlist'=>$streetlist,
            'roles'=>$this->roles,
            'fund'=>$fund,
            'plotdata'=>$plotdata
        ]);
    }

    public function open($pagemodal,$title,$dataid)
    {
        $this->pagemodal = $pagemodal;
        $this->title = $title;
        $this->dataid = $dataid;
        $this->billcode=$dataid;
       
        
        $this->emit('modal',[$pagemodal,$title,$dataid]);
    }
}
