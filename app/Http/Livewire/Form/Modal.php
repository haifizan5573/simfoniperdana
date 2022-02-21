<?php

namespace App\Http\Livewire\Form;
use Illuminate\Http\Request;

use Livewire\Component;

class Modal extends Component
{
    public function render(Request $request)
    {
        $id=$request->id;
        return view('livewire.form.'.$id)->layout('layouts.master-without-nav');
    }
}
