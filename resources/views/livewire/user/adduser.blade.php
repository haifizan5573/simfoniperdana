

@section('css')


<link href="{{ URL::asset('assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection


<div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="adduser">
                    <h5 class="card-title">Add New User</h5>
                

                        <div class="row">
                           <div class="col-md-12 mb-2">
                           
                           @include('components.input',[
                                            'name'=>'name',
                                            'id'=>'',
                                            'label'=>'Name',
                                            'placeholder'=>'',
                                        
                                            ])  
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12 mb-2">
                           @include('components.input',[
                                            'name'=>'nickname',
                                            'id'=>'',
                                            'label'=>'Nickname',
                                            'placeholder'=>'',
                                        
                                            ])  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-2">
                               
                            @include('components.input',[
                                            'name'=>'email',
                                            'id'=>'',
                                            'label'=>'Email',
                                            'type'=>'email',
                                            'placeholder'=>'',
                                        
                                            ])  
                                    @error('email') <span class="error">{{ $message }}</span> @enderror
                                
                            </div>
                        </div>
                        <div class="row mb-2" >
                            <div class="col-md-6" wire:ignore>
                                     @include('components.select',[
                                            'name'=>'street',
                                            'selectid'=>'street',
                                            'fieldname'=>'',
                                            'id'=>'',
                                            'label'=>'Street No.',
                                            'placeholder'=>'', 
                                            ])                    
                            </div>
                            <div class="col-md-6" wire:ignore>
                                 @include('components.input',[
                                            'name'=>'unit',
                                            'id'=>'',
                                            'label'=>'Unit',
                                            'placeholder'=>'',
                                        
                                            ])               
                            </div>
                            
                        </div>
                        <div class="row" >
                            <div class="col-md-6">
                                @error('street') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6">
                                @error('unit') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-12" wire:ignore>

    

                                     @include('components.select',[
                                            'name'=>'role',
                                            'selectid'=>'role',
                                            'fieldname'=>'',
                                            'id'=>'',
                                            'label'=>'Role',
                                            'placeholder'=>'', 
                                            ])     
                                    
                                        
                            </div>
                            @error('role') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    
             
                 <div class="mt-2">
                 
                               @include('components.button',[
                                   'type'=>'submit',
                                   'class'=>'btn btn-primary',
                                   'onclick'=>'',
                                   'label'=>'Submit',
                                   'target'=>'adduser'
                               ])
                           
                               @include('components.button',[
                                   'type'=>'button',
                                   'class'=>'btn btn-warning',
                                   'onclick'=>"onclick='window.location.href=\"userlist\"'",
                                   'label'=>'Cancel',
                                   'target'=>''
                               ])
                 
                 </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
            </form>
        </div>

</div>
    <!-- end row -->


@push('scripts')


<script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
<script>


$( document ).ready(function() {
    livewire.emit('load',0);
});
window.livewire.on('load', data => {
      
    
                    $('#role').select2({
                            placeholder: 'Select Role',
                            //width: '250px',
                            multiple: true,
                            tags: false,
                            selectOnBlur: true,
                            ajax: {
                                url:  "{{route('rolelist')}}/1",
                                dataType: 'json',
                                delay: 250,
                                processResults: function (data) {
                                return {
                                
                                    results:  $.map(data, function (item) {
                                    
                                        return {
                                            text: item.name,
                                            id: item.id
                                        }
                                    })
                                };
                                },
                                formatSelection: function(item){ return item.name },
                            }
                    });

                    $('#role').on('change', function(e) {

                    let dataval= $(this).val();
                        @this.set('role', dataval);        
                    });


                    $('#street').select2({
                            placeholder: 'Select Street No',
                           
                            tags: false,
                            selectOnBlur: true,
                            ajax: {
                                url:  "{{route('streetlist')}}",
                                dataType: 'json',
                                delay: 250,
                                processResults: function (data) {
                                return {
                                
                                    results:  $.map(data, function (item) {
                                    
                                        return {
                                            text: item.name,
                                            id: item.id
                                        }
                                    })
                                };
                                },
                                formatSelection: function(item){ return item.name },
                            }
                    });

                    $('#street').on('change', function(e) {

                    let dataval= $(this).val();
                        @this.set('street', dataval);        
                    });

                  
            
     
});

window.livewire.on('unit', data => {

                    $('#unit').select2({
                            placeholder: 'Select Unit',
                            //width: '250px',
                            multiple: true,
                            tags: false,
                            selectOnBlur: true,
                            ajax: {
                                url:  "{{route('unitlist')}}/"+data,
                                dataType: 'json',
                                delay: 250,
                                processResults: function (data) {
                                return {
                                
                                    results:  $.map(data, function (item) {
                                    
                                        return {
                                            text: item.name,
                                            id: item.id
                                        }
                                    })
                                };
                                },
                                formatSelection: function(item){ return item.name },
                            }
                    });

                    $('#unit').on('change', function(e) {

                    let dataval= $(this).val();
                        @this.set('unit', dataval);        
                    });

});   
</script>
@include('components.toastr') 
@endpush
