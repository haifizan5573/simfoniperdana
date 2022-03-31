<?php

namespace App\Http\Livewire\Loan;

use Livewire\Component;
use App\Models\Loan;
use App\Models\Product;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use Auth;
use Session;

class ApplicationList extends Component
{
    use WithPagination;
    public $filter,$search,$productlist;

    public $sortField = "status";
    public $sortAsc = true;
    protected $queryString = ['search', 'sortAsc', 'sortField'];
    protected $paginationTheme = 'bootstrap';

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

    public function mount(Request $request){

        $this->filter=$request->id;

    }

    public function render()
    {

        $message=Session::get('message');
        $alerttype=Session::get('alert-type');
        $toastrdata=array("message"=>$message,"alert-type"=>$alerttype);
        
        return view('livewire.loan.application-list',[
            'loans'=>$this->loanList(),
            'toastrdata'=>$toastrdata
        ]);
    }

    public function loanList(){

       
        $roles=Auth::User()->roles()->first()->name;
        $this->agentlist=User::where('parent',Auth::user()->id)->get()->pluck('id')->toArray();
 

        if($roles=="Admin"){

      
                return Loan::whereHas('customer', function ($query) {
                    if(!empty($this->search)){
                    $query->where('name', 'like', '%' . $this->search . '%');
                    $query->orwhere('icnumber', 'like', '%' . $this->search . '%');
                    }
                })
                ->when(!empty($this->filter),function($q){
                    $q->where('productid',$this->filter);
                })
                ->orderBy('created_at','asc')->paginate(30);
           

        }
        else if($roles=="Staff"){

            return Loan::whereHas('customer', function ($query) {
                if(!empty($this->search)){
                $query->where('name', 'like', '%' . $this->search . '%');
                $query->orwhere('icnumber', 'like', '%' . $this->search . '%');
                }
            })
            ->where('assignto',Auth::user()->id)
            ->when(!empty($this->filter),function($q){
                $q->where('productid',$this->filter);
            })
            ->orderBy('created_at','asc')->paginate(30);

        }
        else if($roles=="Agent"||$roles=="Sub-Agent"){

      
                return Loan::whereHas('customer', function ($query) {
                    if(!empty($this->search)){
                    $query->where('name', 'like', '%' . $this->search . '%');
                    $query->orwhere('icnumber', 'like', '%' . $this->search . '%');
                    }
                })
                ->where('agentid',Auth::user()->id)
                ->when($roles=="Agent",function($q){
                    $q->whereIn('agentid',$this->agentlist);
                })
                ->when(!empty($this->filter),function($q){
                    $q->where('productid',$this->filter);
                })
                ->orderBy('created_at','asc')->paginate(30);
           
        }
   
       
    }

}
