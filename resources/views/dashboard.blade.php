@extends('layouts.master')

@section('content')

   
<div class="row">

        @include('livewire.dashboard.upcomingevents')

        @include('livewire.dashboard.notifications')

        @include('livewire.dashboard.upcomingevents')
    
</div>
                 
@endsection
