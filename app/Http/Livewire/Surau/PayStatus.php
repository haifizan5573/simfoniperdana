<?php

namespace App\Http\Livewire\Surau;

use Livewire\Component;
use App\Http\Requests;

class PayStatus extends Component
{
    public function mount(Request $request){

        dd($request);

    }
    public function render()
    {
        return view('livewire.surau.pay-status');
    }
}
