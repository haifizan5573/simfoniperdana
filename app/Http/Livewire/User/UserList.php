<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserList extends Component
{

    use WithPagination;
    use AuthorizesRequests;
    

     public $search,$filter;
     public $sortField="email";
     public $sortAsc = true;
     protected $queryString = ['search', 'sortAsc', 'sortField'];
     protected $paginationTheme = 'bootstrap';

    public function mount(){
         $this->sortField="status";
         $this->sortAsc=false;
     }

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
    public function render()
    {
        $users=User::with("roles")->whereHas("roles", function($q) {   

            if(!empty($this->filter)){
                $q->where("name",$this->filter);
            }                                                                                                       
            
        })->paginate(30);
        return view('livewire.user.userlist',[
            'users'=>$users
        ]);
    }
}
