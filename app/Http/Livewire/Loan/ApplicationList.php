<?php

namespace App\Http\Livewire\Loan;

use Livewire\Component;
use App\Models\Loan;
use Livewire\WithPagination;
use Illuminate\Http\Request;

class ApplicationList extends Component
{
    use WithPagination;
    public $filter,$search;

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
        
        return view('livewire.loan.application-list',[
            'loans'=>$this->loanList()
        ]);
    }

    public function loanList(){

   
        if(!$this->filter){
            return Loan::whereHas('customer', function ($query) {
                if(!empty($this->search)){
                $query->where('name', 'like', '%' . $this->search . '%');
                $query->orwhere('icnumber', 'like', '%' . $this->search . '%');
                }
            })->orderBy('created_at','asc')->paginate(5);
        }else{
            return Loan::where('productid',$this->filter)->orderBy('created_at','asc')->paginate(30);
        }
       
    }

}
