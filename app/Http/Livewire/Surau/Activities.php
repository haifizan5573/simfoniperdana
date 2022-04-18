<?php

namespace App\Http\Livewire\Surau;

use Livewire\Component;
use App\Models\Activity;
use Livewire\WithPagination;
use App\Helpers\Formatter;
use Auth;
use Session;
use Carbon\Carbon;

class Activities extends Component
{
    use WithPagination;
 

    public $filter,$search,$status;
    public $appid,$name,$description,$startdate,$enddate,$starttime,$endtime,$category,$categoryplaceholder,$statusplaceholder;
    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'name' => 'required|min:4',
        'category'=>'required',
        'startdate' => 'required|before_or_equal:enddate|after_or_equal:today',
        'enddate' => 'nullable|after_or_equal:startdate',
     
    ];

    public function render()
    {

        $message=Session::get('message');
        $alerttype=Session::get('alert-type');
        $toastrdata=array("message"=>$message,"alert-type"=>$alerttype);
     

        $activities=Activity::when(!empty($this->search),function($q){
                
                $q->where('name','like','%'.$this->search.'%');
                $q->orwhere('description','like','%'.$this->search.'%');
                
            })
            ->orderby('start_date','desc')
            ->paginate(30);

        return view('livewire.surau.activities',[
            'activities'=>$activities
        ]);
    }

    public function open($pagemodal,$title,$dataid)
    {
        $this->pagemodal = $pagemodal;
        $this->title = $title;

     
        $helper=new Formatter();

        $activity=Activity::find($dataid);
        $this->appid=$dataid;
        $this->name=$activity->name;
        $this->description=$activity->description;
        $this->startdate=$helper->formatDate2($activity->start_date);
        $this->enddate=$helper->formatDate2($activity->end_date);
        $this->starttime=Carbon::parse($activity->start_date)->format('h:i A');
        $this->endtime=(!empty($activity->end_date))?Carbon::parse($activity->end_date)->format('h:i A'):"";
        $this->categoryplaceholder=$activity->Category()->first()->name;
        $this->category=$activity->category;
        $this->statusplaceholder=$activity->Status()->first()->name;
        $this->status=$activity->status;

        $data=array('startdate'=>$this->startdate,'enddate'=>$this->enddate,'category'=>$this->categoryplaceholder,'status'=>$this->statusplaceholder,'description'=>$this->description);
            
        $this->emit('modal',[$this->pagemodal,$this->title,$data]);
    }

    public function editactivitysurau(){

        //dd($this->enddate);

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


        $update=Activity::find($this->appid);

        $update->update([
            'name'=>$this->name,
            'description'=>$this->description,
            'start_date'=>$formatted_startdate,
            'end_date'=>$formatted_enddate,
            'category'=>$this->category,
            'status'=>$this->status
        ]);

        $this->message=array("message"=>"Activity updated","alert-type"=>"success");
   

        $this->emit('showmessage',[$this->message]);
        $this->emit('closemodal');
        $this->mount(); 
        
    }
}
