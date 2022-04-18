<?php

namespace App\Http\Livewire\Surau;

use Livewire\Component;
use App\Models\Activity;
use App\Models\Label;
use Carbon\Carbon;
use App\Helpers\Formatter;

class ActivityPage extends Component
{
    public function mount($actid){
        $this->actid=$actid;
    }

    public function render()
    {
       
        $category=Label::find($this->actid);
        $formatter=new Formatter();

        if(!isset($category->id)){
            abort(404);
        }

        $activitiestoday=Activity::where('category',$this->actid)
        ->whereDate('start_date','=',date('Y-m-d'))
        ->orwhere(function($query){
                $query->whereNotNull('end_date')
                ->whereDate('end_date', '>=', date('Y-m-d'))
                ->where('category',$this->actid);
        })
        ->orderby('start_date','desc')
        ->paginate(30);

        $activitiesupcoming=Activity::where('category',$this->actid)
        ->whereDate('start_date','>',date('Y-m-d'))
        ->orderby('start_date','desc')
        ->paginate(30);

      //  dd($activitiestoday);
       

        return view('livewire.surau.activity-page',[
            'activitiestoday'=>$activitiestoday,
            'activitiesupcoming'=>$activitiesupcoming,
            'category'=>$category->name,
            'description'=>$category->description,
            'image'=>$category->icon,
            'formatter'=>$formatter
        ])->layout('layouts.master-plain');
    }
}
