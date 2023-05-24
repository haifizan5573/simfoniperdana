<?php

namespace App\Http\Livewire\Sim5;

use Livewire\Component;

class Event extends Component
{

    public $currentEvent;

    public function getCurrentEventProperty()
    {
        $currentTime = now()->format('H.i');

        if ($currentTime >= '09.00' && $currentTime < '09.15') {
            return 'Speech from JMB';
        }

        if ($currentTime >= '09.15') {
            return 'Lucky';
        }

        return 'Waiting for the event';
    }

    public function render()
    {
        return view('livewire.sim5.event')->extends('layouts.master-plain');
    }
}
