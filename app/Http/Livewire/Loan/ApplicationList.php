<?php

namespace App\Http\Livewire\Loan;

use Livewire\Component;
use App\Models\Loan;
use Livewire\WithPagination;
use Illuminate\Http\Request;

class ApplicationList extends Component
{
    use WithPagination;
    public $filter;

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
        
        return view('livewire.loan.application-list');
    }

    public function loanList(){

        if(!$this->filter){
            return Loan::orderBy('date_created','asc')->paginate(30);
        }else{
            return Loan::where('productid',$this->filter)->orderBy('date_created','asc')->paginate(30);
        }
       
    }

}
