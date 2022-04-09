@section('css')

<style>
.scrollClass {
  height:150px;
  width: 100%;
  overflow-y: scroll;
}
</style>

@endsection

   
<div class="row">


    
    @include('livewire.dashboard.slide')   
    <div class="row">
        @include('livewire.dashboard.upcomingevents')

        @include('livewire.dashboard.notifications')

        @include('livewire.dashboard.forms')
    </div>
    
    
</div>
                 
