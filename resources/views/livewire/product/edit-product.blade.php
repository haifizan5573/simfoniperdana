

@section('css')


<link href="{{ URL::asset('assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection


<div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="addproduct">
                    <h5 class="card-title">Edit Product</h5>
                
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

                        <div class="row mt-2">
                           <div class="col-md-12 mb-2">
                           @include('components.input',[
                                            'name'=>'minloan',
                                            'id'=>'',
                                            'type'=>'number',
                                            'label'=>'Minimun Loan',
                                            'placeholder'=>'',
                                        
                                            ])  
                         
                            </div>
                        </div>

                        <div class="row mt-2">
                           <div class="col-md-12 mb-2">
                           @include('components.input',[
                                            'name'=>'maxloan',
                                            'id'=>'',
                                            'type'=>'number',
                                            'label'=>'Maximum Loan',
                                            'placeholder'=>'',
                                        
                                            ])  
                         
                            </div>
                        </div>

                        <div class="row mt-2">
                           <div class="col-md-12 mb-2">
                           @include('components.input',[
                                            'name'=>'maxtenure',
                                            'id'=>'',
                                            'type'=>'number',
                                            'label'=>'Tenure (Years)',
                                            'placeholder'=>'',
                                        
                                            ])  
                         
                            </div>
                        </div>

                        <div class="row mt-2">
                        
                                    <div class="col-6">
                                            
                                            @for($i=0;$i<$keyrate ;$i++)

                                                    <div class="row">
                                                        
                                                            <div class="mb-2 col-6">
                                                            
                                                            <label class="form-label">Rate</label>
                                                            <input type="text" class="form-control" placeholder="" wire:model.lazy="rate.{{$i}}"> 
                                                        </div>
                                                        <div class="mb-2 col-2">
                                                            <button wire:click="deleterate()" type="button" class="btn btn-danger waves-effect waves-light mt-4">
                                                                <i class="mdi mdi-trash-can font-size-16 align-middle"></i>
                                                            </button>
                                                        </div>
                                                    </div>


                                            @endfor
                                           
                                    </div>  
                      </div>
                      <div class="row" wire:ignore>
                                                <div class="col-3">
                                                <input  type="button" wire:click="addrate()" class="btn btn-success" value="Add Rate">
                                                </div>
                     </div>

             
                 <div class="mt-2">
                 
                               @include('components.button',[
                                   'type'=>'submit',
                                   'class'=>'btn btn-primary',
                                   'onclick'=>'',
                                   'label'=>'Submit',
                                   'target'=>'editproduct'
                               ])
                           
                               @include('components.button',[
                                   'type'=>'button',
                                   'class'=>'btn btn-warning',
                                   'onclick'=>"onclick='window.location.href=\"".route('product')."\"'",
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
