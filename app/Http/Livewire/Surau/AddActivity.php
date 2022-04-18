<?php

namespace App\Http\Livewire\Surau;
use App\Models\Activity;
use Carbon\Carbon;

use Livewire\Component;

class AddActivity extends Component
{

    public $name,$description,$startdate,$enddate,$starttime,$endtime,$category;

    protected $rules = [
        'name' => 'required|min:4',
        'category'=>'required',
        'startdate' => 'required|before_or_equal:enddate|after_or_equal:today',
        'enddate' => 'nullable|after_or_equal:startdate',     
    ];

    public function render()
    {
        return view('livewire.surau.add-activity');
    }

    public function addactivitysurau(){

      //  dd($this->starttime);

      $dateFromRules = 'required|after_or_equal:today';

      if (!empty($this->enddate)) {
          $dateFromRules .= 'before_or_equal:enddate';
      }

      $rules = [
          'name' => 'required|min:4',
          'category'=>'required',
          'startdate' => $dateFromRules,
          'enddate' => 'nullable|after_or_equal:startdate',
       
      ];

        $this->validate($rules);

        if(empty($this->starttime)){
            $formatted_startdate=Carbon::createFromFormat('d M, Y',$this->startdate)->format('Y-m-d');
        }
        else{
            $formatted_startdate=Carbon::createFromFormat('d M, Y h:i A',$this->startdate." ".$this->starttime)->format('Y-m-d H:i:s');
        }

        $formatted_enddate=NULL;
        if(!empty($this->enddate)){
            if(empty($this->endtime)){
                $formatted_enddate=Carbon::createFromFormat('d M, Y',$this->enddate)->format('Y-m-d');
            }
            else{
                $formatted_enddate=Carbon::createFromFormat('d M, Y h:i A',$this->enddate." ".$this->endtime)->format('Y-m-d H:i:s');
            }
        }

        Activity::create([
            'name'=>$this->name,
            'description'=>$this->description,
            'start_date'=>$formatted_startdate,
            'end_date'=>$formatted_enddate,
            'category'=>$this->category,
            'status'=>1
        ]);


        $result = array("alert-type" => "success", "message" => "New User Created");
       
        return redirect()->route('activities')->with($result);


    }
}
