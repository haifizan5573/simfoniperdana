<?php

namespace App\Http\Livewire\Surau;

use App\Http\Livewire\API\SystemData;
use Livewire\Component;
use App\Models\Khairat;
use App\Models\FileUpload;
use App\Models\KhairatUser;
use Livewire\WithPagination;
use Auth;
use Session;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class KhairatData extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public $filter,$roles,$search,$status,$khairat,$curpage,$street,$kid;
    protected $paginationTheme = 'bootstrap';


    public function mount(){

        $this->filter=(empty($this->filter))?date('Y'):$this->filter;
        $this->roles=Auth::user()->roles()->pluck('name')->ToArray();
        $this->khairat=Khairat::where('year',date('Y'))->first();
      
    }

    public function render()
    {
        $message=Session::get('message');
        $alerttype=Session::get('alert-type');
        $toastrdata=array("message"=>$message,"alert-type"=>$alerttype);
        $this->curpage="khairat";

        $data=$this->khairatdata();
     
        
        $break=0;
        if(in_array('Admin',$this->roles)||in_array('Surau Committee',$this->roles)){
              // dd($this->filter);
              $khairatdata=KhairatUser::whereHas('khairat', function($q){
                       $q->where('year', '=',$this->filter);
                       })
                       ->when(!empty($this->search),function($q){
                            $q->whereHas('user',function($u){
                               $u->where('name','like','%'.$this->search.'%');
                            });
                       })
                       ->whereHas("Addresses", function($q) {   

                        if(!empty($this->street)){
                            $q->where("street",$this->street);
                        }                                                                                                       
                        
                      })
                       ->paginate(30);
                
                $khairatcount=$khairatdata->total();
            $break=1;
         }
  
        
  
        if(in_array('Owner',$this->roles)&&$break==0){

            $khairatdata=KhairatUser::where('userid',Auth::user()->id)
                ->paginate(30);
            $khairatcount=$khairatdata->total();
        }

        $systemdata=new SystemData();
        $streetlist=$systemdata->streetlist(1);

 

        $plotdata=array();
       
        foreach($streetlist as $street){
            $totalcontrib=0;
            $contribs=KhairatUser::whereHas("Addresses", function($q) use ($street) {   
    
                    $q->where("street",$street['name']);
                                                                                                               
            })
            ->where("khairat",$this->khairat->id)
            ->get();

            foreach($contribs as $contrib){
                $payment=$contrib->Membership()->first()->other;
                $totalcontrib+=str_replace('RM','',$payment);
            }

           $plotdata[]=array(
                        "x"=>$street['name'],
                        "y"=>$totalcontrib,
                    );
        }

        $plotdata=json_encode($plotdata);

      

        return view('livewire.surau.khairat-data',[
            'khairats'=>$khairatdata,
            'toastrdata'=>$toastrdata,
            'roles'=>$this->roles,
            'khairat'=>$this->khairat,
            'streetlist'=>$streetlist,
            'khairatcount'=>$khairatcount,
            'total'=>$data[0],
            'expense'=>$data[1],
            'balance'=>$data[2],
            'totalreg'=>$data[3],
            'plotdata'=>$plotdata
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

    

    public function open($pagemodal,$title,$dataid)
    {
        $this->pagemodal = $pagemodal;
        $this->title = $title;
        $this->dataid = $dataid;
        $this->data=FileUpload::where('file_uploadsable_id',$dataid)->first();
        $this->appstatus="";
        if($pagemodal=="livewire.form.updatestatus"){
            $this->khairatuser=KhairatUser::where('userid',$dataid)->first();
            $this->appstatus=$this->khairatuser->label()->first()->name;
            $this->status=$this->khairatuser->status;
            $this->kid=$dataid;
        }
        
        $this->emit('modal',[$pagemodal,$title,$dataid,$this->appstatus]);
    }

    public function editstatus(){

     

        if(!empty($this->status)){
            $khairatuser=KhairatUser::find($this->kid);
            dd($khairatuser->kid);

            $khairatuser->update(['status'=>$this->status]);
    
            $this->message=array("message"=>"Payment status updated","alert-type"=>"success");
        }else{
            $this->message=array("message"=>"Oppss!! error occured. Please try again later","alert-type"=>"error");
        }


        $this->emit('showmessage',[$this->message]);
        $this->emit('closemodal');
        $this->mount(); 

    }
}
