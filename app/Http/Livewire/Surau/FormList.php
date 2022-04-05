<?php

namespace App\Http\Livewire\Surau;

use Livewire\Component;
use App\Models\Form;
use App\Helpers\Formatter;

class FormList extends Component
{
    public function mount(){

        $forms=Form::paginate(30);

    }

    public function render()
    {
        return view('livewire.surau.form-list',[
            'forms'=>Form::paginate(30),
            'formatter'=>new Formatter,
        ]);
    }
}
