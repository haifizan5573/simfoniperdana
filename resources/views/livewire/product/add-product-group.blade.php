

@section('css')


<link href="{{ URL::asset('assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection


<div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="addproductgroup">
                    <h5 class="card-title">Add Product Group</h5>
                
                        <div class="row mt-2">
                           <div class="col-md-12 mb-2">
                           @include('components.input',[
                                            'name'=>'name',
                                            'id'=>'',
                                            'label'=>'Product Group Name',
                                            'placeholder'=>'',
                                        
                                            ])  
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
             
                 <div class="mt-2">
                 
                               @include('components.button',[
                                   'type'=>'submit',
                                   'class'=>'btn btn-primary',
                                   'onclick'=>'',
                                   'label'=>'Submit',
                                   'target'=>'addproductgroup'
                               ])
                           
                               @include('components.button',[
                                   'type'=>'button',
                                   'class'=>'btn btn-warning',
                                   'onclick'=>"onclick='window.location.href=\"product\"'",
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
@include('components.toastr') 
@endpush
