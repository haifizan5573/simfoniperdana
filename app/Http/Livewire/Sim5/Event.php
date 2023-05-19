<?php

namespace App\Http\Livewire\Sim5;

use Livewire\Component;

class Event extends Component
{
    public function render()
    {
        return view('livewire.sim5.event')->extends('layouts.master-without-nav');
    }
}
