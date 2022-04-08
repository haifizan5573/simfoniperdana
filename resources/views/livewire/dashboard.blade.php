@section('css')



@endsection

   
<div class="row">


    
    @include('livewire.dashboard.slide')   
    <div class="row">
        @include('livewire.dashboard.upcomingevents')

        @include('livewire.dashboard.notifications')

        @include('livewire.dashboard.forms')
    </div>
    
    
</div>
                 
