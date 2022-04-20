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

    @include('livewire.dashboard.banner')   
    @include('livewire.dashboard.mainmenu')   
    @include('livewire.dashboard.simfoni')   
  
    <div class="row">
        @include('livewire.dashboard.upcomingevents')

        @include('livewire.dashboard.notifications')

        @include('livewire.dashboard.forms')
    </div>
   
   
    <div>
    @include('components.modal',['size'=>'lg']) 
    </div>
</div>

@push('scripts')

<script>
        window.livewire.on('closemodal', data => {
                $('#appmodal').modal('hide'); 
            });

        window.livewire.on('modal', data => {

                $('#appmodal').modal('show'); 
        });
</script>
@endpush
